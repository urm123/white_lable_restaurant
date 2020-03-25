<?php

namespace App\Http\Controllers\Admin;

use App\Delivery;
use App\Repository\MenuItemRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

/**
 * Class DeliveryController
 * @package App\Http\Controllers\Admin
 */
class DeliveryController extends Controller
{

    protected $menu_item;

    /**
     * DeliveryController constructor.
     * @param MenuItemRepository $menu_item_repository
     */
    public function __construct(MenuItemRepository $menu_item_repository)
    {
        $this->menu_item = $menu_item_repository;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $id = false;

        if ($request->id) {
            $id = $request->id;
        }
        return view('admin.delivery.index', ['id' => $id]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getDeliveries(Request $request)
    {
        $sort = $request->sort;

        $sortString = '';

        switch ($sort) {
            case 'pending':
                $sortString = "'pending','accepted','declined'";
                break;

            case 'accepted':
                $sortString = "'accepted','pending','declined'";
                break;

            case 'declined':
                $sortString = "'declined','pending','accepted'";
                break;
        }

        $deliveries = Auth::user()
            ->restaurant
            ->deliveries()
            ->whereRaw("date(time)>='$request->date_from'")
            ->whereRaw("date(time)<='$request->date_to'")
            ->orderByRaw('field(restaurant_status,' . $sortString . ')')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        foreach ($deliveries as $delivery) {

            $delivery->user = $delivery->user()->first();
            $delivery->items = $delivery->deliveryItems()->get();

            $delivery->subtotal = 0;
            $delivery->reduction = 0;

            $delivery->restaurant = $delivery->restaurant()->first();

            foreach ($delivery->items as $item) {
                $item->menu_item = $item->menuItem()->first();
                $item->delivery_item_addons = $item->addonMenuItems()->get();
                $item->variant = $item->menuItemVariants()->first();

                foreach ($item->delivery_item_addons as $addon_menu_item) {
                    $addon_menu_item->addon = $this->menu_item->getAddon($addon_menu_item['menu_item_id'], $addon_menu_item['addon_id']);
                }

                if ($item->variant) {
                    $item->variant->variant = $this->menu_item->getVariant($item->variant->menu_item_id, $item->variant->variant_id);
                }

                $menu_item_price = 0;

                if ($item->variant) {
                    $menu_item_price = $item->variant->price * $item->quantity;
                } else {
                    if ($item->menuItem)
                        $menu_item_price = $item->quantity * $item->menuItem->price;
                }

                if ($delivery->menuItem) {
                    if ($delivery->menuItem->id == $delivery->menu_item_id) {
                        if ($delivery->menuItem->promo_type == 'percentage') {
                            $delivery->reduction = $menu_item_price * $delivery->menuItem->promo_value * 0.01;
                        } else {
                            $delivery->reduction = $delivery->menuItem->promo_value;
                        }
                    }
                }

                $delivery->subtotal += $menu_item_price;

                if ($item->addonMenuItems) {
                    foreach ($item->addonMenuItems as $addon) {
                        if ($addon)
                            $delivery->subtotal += $addon->price;
                    }
                }

            }

            if ($delivery->promotion) {
                if ($delivery->promotion->type == 'percentage') {
                    $delivery->reduction = $delivery->subtotal * $delivery->promotion->value * 0.01;
                } else {
                    $delivery->reduction = $delivery->promotion->value;
                }
            }
            if ($delivery->sitePromotion) {
                if ($delivery->sitePromotion->type == 'percentage') {
                    $delivery->reduction = $delivery->subtotal * $delivery->sitePromotion->value * 0.01;
                } else {
                    $delivery->reduction = $delivery->sitePromotion->value;
                }
            }

            $delivery->payment = json_decode($delivery->payment, true);

            $delivery->date = Carbon::parse($delivery->time)->toFormattedDateString();
            $delivery->display_time = Carbon::parse($delivery->time)->format('g:i A');

            $delivery->subtotal = number_format($delivery->subtotal, '2', '.', ',');
            $delivery->delivery_charge = number_format($delivery->delivery_charge, '2', '.', ',');
            $delivery->vat = number_format($delivery->vat, '2', '.', ',');
            $delivery->reduction = number_format($delivery->reduction, '2', '.', ',');
            $delivery->total = number_format($delivery->total, '2', '.', ',');
        }

        return response()->json([
            'message' => 'success',
            'data' => [
                'deliveries' => $deliveries
            ]
        ]);
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
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

        if ($delivery->user->email == setting('guest_email_id')) {
            $user_email = $delivery->email;
        } else {
            $user_email = $delivery->user->email;
        }

        $restaurant = $delivery->restaurant()->first();
        $theme = setting('site_theme');

        if($theme == 'orange-peel') {
            $color_theme = '#ffbf00';
            $button_color = '#d38a0c';
        } elseif ($theme == 'whiskey') {
            $color_theme = '#d3a971';
            $button_color = '#d38a0c';
        } elseif ($theme == 'thunderbird') {
            $color_theme = '#cb1511';
            $button_color = '#900906';
        } elseif ($theme == 'amber') {
            $color_theme = '#ffbf00';
            $button_color = '#d38a0c';
        } elseif ($theme == 'apple') {
            $color_theme = '#409843';
            $button_color = '#2d5840';
        } else {
            $color_theme = '#2A8F38';
            $button_color = '#db6d13';
        }

        $theme = [
            'color_theme'       => $color_theme,
            'button_color'      => $button_color,
            'restaurant_email'  => $restaurant->email,
            'restaurant_tel'    => $restaurant->phone,
            'current_year'      => date('Y'),
            'terms_url'         => config('app.url').'/terms-and-conditions',
            'app_name'          => config('app.name'),
            'app_logo'          => asset('storage/'. $restaurant->logo)
        ];


        switch ($request->all()['delivery']['delivery_status']) {
            case'dispatched':
                Mail::send(['html' => 'user.email.delivery-dispatched'], ['delivery' => $delivery, 'theme' => $theme],
                    function ($message) use ($user_email) {
                        $message->to($user_email)
                            ->subject('Order dispatched');
                    });
                break;
            case 'delivered':
                Mail::send(['html' => 'user.email.delivery-delivered'], ['delivery' => $delivery, 'theme' => $theme],
                    function ($message) use ($user_email) {
                        $message->to($user_email)
                            ->subject('Order delivered');
                    });
                break;
        }

        if ($request->all()['delivery']['restaurant_status'] == 'declined') {
            Mail::send(['html' => 'user.email.delivery-declined'], ['delivery' => $delivery, 'theme' => $theme],
                function ($message) use ($user_email) {
                    $message->to($user_email)
                        ->subject('Order declined');
                });
        }

        $update = $delivery->update([
            'delivery_status' => $request->all()['delivery']['delivery_status'],
            'restaurant_status' => $request->all()['delivery']['restaurant_status'],
        ]);

        if ($update) {
            return response()->json([
                'message' => 'success',
                'data' => [
                    'delivery' => $delivery
                ]
            ]);
        } else {
            return response()->json([
                'message' => 'failed',
            ]);
        }
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
