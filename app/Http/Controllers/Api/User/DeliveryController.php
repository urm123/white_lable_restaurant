<?php

namespace App\Http\Controllers\Api\User;

use App\Delivery;
use App\Http\Controllers\Controller;
use App\Repository\DeliveryRepository;
use App\Repository\MenuItemRepository;
use App\Repository\RestaurantRepository;
use App\Setting;
use App\Support\Socket;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe\Charge;
use Stripe\Stripe;

/**
 * Class DeliveryController
 * @package App\Http\Controllers\Api\User
 */
class DeliveryController extends Controller
{

    protected $delivery;

    protected $socket;

    protected $restaurant;

    protected $menu_item;

    /**
     * DeliveryController constructor.
     * @param DeliveryRepository $delivery_repository
     * @param Socket $socket
     */
    public function __construct(
        DeliveryRepository $delivery_repository,
        Socket $socket,
        RestaurantRepository $restaurant_repository,
        MenuItemRepository $menu_item_repository
    )
    {
        $this->delivery = $delivery_repository;
        $this->socket = $socket;
        $this->restaurant = $restaurant_repository;
        $this->menu_item = $menu_item_repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $deliveries = Auth::user()->deliveries;

        foreach ($deliveries as $delivery) {
            $delivery->delivery_items = $delivery->deliveryItems;

            $delivery->restaurant = $delivery->restaurant()->first();


            foreach ($delivery->delivery_items as $delivery_item) {
                $delivery_item->menu_item = $delivery->menuItem;
            }

            $delivery->time = Carbon::parse($delivery->time)->diffForHumans();

            switch ($delivery->status) {
                case 'initiated':
                    $progress = 12;
                    break;
                case 'approved':
                    $progress = 25;
                    break;
                case 'dispatched':
                    $progress = 50;
                    break;
                case 'delivered':
                    $progress = 88;
                    break;
                default:
                    $progress = 12;
                    break;
            }

            $delivery->progress = $progress;
        }


        if ($deliveries) {
            return response()->json([
                'message' => 'success',
                'data' => [
                    'deliveries' => $deliveries
                ]
            ]);
        } else {
            return response()->json([
                'message' => 'Failed'
            ], 400);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Pusher\PusherException
     */
    public function store(Request $request)
    {
        $promotion = json_decode($request->promotion);

        $request->request->set('user_id', Auth::id());

        $request->request->set('time', Carbon::parse($request->date . ' ' . $request->time)->toDateTimeString());

        $request->request->set('delivery_status', 'initiated');

        $restaurant = $this->restaurant->getRestaurant($request->restaurant_id);

        $delivery_charge = 0;

        $delivery_validation = false;

        foreach ($restaurant->deliveryLocations as $delivery_location) {
            if ($request->postcode == $delivery_location->postcode) {
                $request->request->set('delivery_charge', $delivery_location->delivery_cost);
                $delivery_charge = $delivery_location->delivery_cost;
                $delivery_validation = true;
            }
        }

        if (!$delivery_validation) {
            return response()->json([
                'message' => 'We do not deliver to this location.!'
            ], 400);
        }

        $cart = $request->cart;

        $token = $request->token;

        $total = 0;

        $discount = 0;

        $subtotal = 0;

        $vat = 0;

        foreach ($cart as $item) {

            $menu_item = $this->menu_item->get($item['menu_item_id']);

            if ($menu_item) {

                $menu_item_price = 0;

                if (isset($item['variant'])) {
                    $variant = $this->menu_item->getVariant($item['menu_item_id'], $item['variant']);
                    $menu_item_price = $variant->pivot->price * $item['quantity'];
                } else {
                    $menu_item_price = $menu_item->price * $item['quantity'];
                }

                if ($promotion) {
                    if ($promotion->method == 'menu_item' && $promotion->id == $menu_item->id) {
                        if ($promotion->promo_type == 'percentage') {
                            $discount = $menu_item_price * $promotion->promo_value * 0.01;
                        } else {
                            $discount = $promotion->promo_value;
                        }
                    }
                }

                $subtotal += $menu_item_price;

                $vat += getVat()[$menu_item->vat_category] * $menu_item_price;

                if (isset($item['addons'])) {
                    foreach ($item['addons'] as $selected_addon) {
                        $addon = $this->menu_item->getAddon($item['menu_item_id'], $selected_addon);
                        $subtotal += $addon->pivot->price;
                    }
                }
            }
        }

        $vat += $delivery_charge * getVat()['delivery'];

        $request->request->set('vat', $vat);

        $request->request->set('delivery_charge', $delivery_charge);

        if ($promotion) {
            if ($promotion->method == 'site' || $promotion->method == 'restaurant') {
                if ($promotion->type == 'percentage') {
                    $discount = $subtotal * $promotion->value * 0.01;
                } else {
                    $discount = $promotion->value;
                }
            }
        }

        $request->request->set('menu_item_id', null);
        $request->request->set('promotion_id', null);
        $request->request->set('site_promotion_id', null);
        $request->request->set('site_discount', null);
        $request->request->set('restaurant_discount', null);

        if ($promotion) {
            switch ($promotion->method) {
                case 'site':
                    $request->request->set('site_promotion_id', $promotion->id);
                    break;
                case 'restaurant':
                    $request->request->set('promotion_id', $promotion->id);
                    break;
                case 'menu_item':
                    $request->request->set('menu_item_id', $promotion->id);
                    break;
            }
        }

        $setting = Setting::first();

        $site_discount = 0;

        $restaurant_discount = 0;

        if (Carbon::now()->startOfDay()->lte(Carbon::parse($restaurant->expiry_date)->startOfDay()) && Carbon::now()->startOfDay()->gte(Carbon::parse($restaurant->start_date)->startOfDay())) {
            if ($restaurant->discount_type == 'percentage') {
                $restaurant_discount = $subtotal * $restaurant->discount_value * 0.01;
            } else {
                $restaurant_discount = $restaurant->discount_value;
            }
            $request->request->set('restaurant_discount', $restaurant_discount);

        }

        if (Carbon::now()->startOfDay()->lte(Carbon::parse($setting->expiry_date)->startOfDay()) && Carbon::now()->startOfDay()->gte(Carbon::parse($setting->start_date)->startOfDay())) {
            if ($setting->discount_type == 'percentage') {
                $site_discount = $subtotal * $setting->discount_value * 0.01;
            } else {
                $site_discount = $setting->discount_value;
            }
            $request->request->set('site_discount', $site_discount);
        }

        $total = $subtotal + $vat + $delivery_charge - $discount - $site_discount - $restaurant_discount;

        $request->request->set('total', $total);

        $delivery = $this->delivery->create($request->all());


        foreach ($cart as $item) {
            $delivery_item = $this->delivery->createDeliveryItem([
                'delivery_id' => $delivery->id,
                'menu_item_id' => $item['menu_item_id'],
                'quantity' => $item['quantity'],
            ]);

            if (isset($item['addons'])) {
                foreach ($item['addons'] as $selected_addon) {
                    $delivery_item->deliveryItemAddons()->create([
                        'addon_id' => $selected_addon
                    ]);
                }
            }

            if (isset($item['variant'])) {
                $delivery_item->update([
                    'variant_id' => $item['variant']
                ]);
            }
        }

        $this->socket->push($delivery->attributesToArray(), 'create delivery', config('app.name').'_'. $request->restaurant_id);

        $charge = null;

        if ($request->token) {

            Stripe::setApiKey('sk_live_skoYZM5IFV0rCiRWBy25ggVB00muZnJs9E');

            $charge = Charge::create(['amount' => round($total, 2) * 100, 'currency' => 'eur', 'source' => $token]);
        }


        if ($delivery) {
            if ($charge && $request->payment == 'card') {

                $payment = json_encode([
                    'type' => 'card',
                    'payment' => $charge
                ]);

                $delivery->update(['payment' => $payment]);


            } else {

                $delivery->update(['payment' => json_encode([
                    'type' => 'cash',
                    'payment' => null
                ])]);
            }

            $delivery->vat = number_format($delivery->vat, 2);
            $delivery->total = number_format($delivery->total, 2);
            $delivery->delivery_charge = number_format($delivery->delivery_charge, 2);
            $delivery->delivery_charge = number_format($delivery->delivery_charge, 2);

            $delivery->delivery_items = $delivery->deliveryItems()->get();

            foreach ($delivery->delivery_items as $delivery_item) {
                $delivery_item->menu_item = $delivery_item->menuItem()->first();
                $delivery_item->variant = $delivery_item->variant()->first();
                $delivery_item->delivery_item_addons = $delivery_item->deliveryItemAddons()->get();

                foreach ($delivery_item->delivery_item_addons as $delivery_item_addon) {
                    $delivery_item_addon->addon = $delivery_item_addon->addon()->first();
                }
            }

            return response()->json([
                'message' => 'success',
                'data' => [
                    'delivery' => $delivery,
                    'charge' => $charge
                ]
            ]);

        } else {
            return response()->json([
                'message' => 'Delivery create failed . Please try again!'
            ], 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Delivery $delivery
     * @return \Illuminate\Http\Response
     */
    public function show(Delivery $delivery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Delivery $delivery
     * @return \Illuminate\Http\Response
     */
    public function edit(Delivery $delivery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Delivery $delivery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Delivery $delivery)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Delivery $delivery
     * @return \Illuminate\Http\Response
     */
    public function destroy(Delivery $delivery)
    {
        //
    }
}
