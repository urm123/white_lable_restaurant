<?php

namespace App\Http\Controllers\User;

use App\Address;
use App\Delivery;
use App\Http\Controllers\Controller;
use App\Repository\DeliveryRepository;
use App\Repository\MenuItemRepository;
use App\Repository\RestaurantRepository;
use App\Rules\Telephone;
use App\Setting;
use App\Support\Socket;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;
use Stripe\Charge;
use Stripe\Stripe;

/**
 * Class DeliveryController
 * @package App\Http\Controllers\User
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
     * @param RestaurantRepository $restaurant_repository
     * @param MenuItemRepository $menu_item_repository
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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {

    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(Request $request)
    {
        $address = Auth::user()->addresses()->where('default', '=', true)->first();

        if (!$address) {
            $address = new Address();
        }

        if ($request->session()->get('cart')) {
            $cart = $request->session()->get('cart');
        } else {
            return redirect(route('user.home'));
        }

        if ($request->session()->get('requests')) {
            $requests = $request->session()->get('requests');
        } else {
            $requests = '';
        }

        $restaurant = $this->restaurant->getRestaurant($request->session()->get('restaurant_id'));

        $delivery_cost = 0;

        foreach ($restaurant->deliveryLocations as $delivery_location) {
            if ($address->postcode == $delivery_location->postcode) {
                $delivery_cost = $delivery_location->delivery_cost;
            }
        }

        if (!$delivery_cost) {
            $delivery_cost = 0;
        }

        $delivery_cost = $delivery_cost * (1 + getVat()['delivery']);

        $setting = Setting::first();

        $restaurant->promo_range = false;
        $setting->promo_range = false;

//        dd(Carbon::now()->toDateTimeString() . ' <> ' . $restaurant->start_date . ' <> ' . $restaurant->expiry_date);

        if (Carbon::now()->startOfDay()->lte(Carbon::parse($restaurant->expiry_date)->startOfDay()) && Carbon::now()->startOfDay()->gte(Carbon::parse($restaurant->start_date)->startOfDay())) {
            $restaurant->promo_range = true;
        }

        if (Carbon::now()->startOfDay()->lte(Carbon::parse($setting->expiry_date)->startOfDay()) && Carbon::now()->startOfDay()->gte(Carbon::parse($setting->start_date)->startOfDay())) {
            $setting->promo_range = true;
        }

        return view('user.delivery.create', [
            'address' => $address,
            'cart' => $cart,
            'requests' => $requests,
            'delivery_cost' => $delivery_cost,
            'restaurant' => $restaurant,
            'setting' => $setting
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Validation\ValidationException
     * @throws \Pusher\PusherException
     */
    public function store(Request $request)
    {
        $validation = [
            'address' => 'required',
            'street' => 'required',
            'city' => 'required',
//            'county' => 'required',
            'postcode' => 'required',
        ];

        if (\auth()->user()->email == setting('guest_email_id')) {
            $validation['email'] = 'required|email';
        }


        $this->validate($request, $validation);

        $promotion = json_decode($request->promotion);

        $request->request->set('user_id', Auth::id());

        $request->request->set('time', Carbon::parse($request->date . ' ' . $request->time)->toDateTimeString());

        $restaurant = $this->restaurant->getRestaurant($request->restaurant_id);

        $delivery_charge = 0;

        foreach ($restaurant->deliveryLocations as $delivery_location) {
            if ($request->postcode == $delivery_location->postcode) {
                $request->request->set('delivery_charge', $delivery_location->delivery_cost);
                $delivery_charge = $delivery_location->delivery_cost;
            }
        }


        if ($request->session()->get('cart')) {
            $cart = $request->session()->get('cart');
        } else {
            return redirect(route('user.home'));
        }

        $total = 0;

        $discount = 0;

        $subtotal = 0;

        $vat = 0;

        foreach ($cart as $item) {

            $menu_item_total_price = 0;

            $menu_item = $this->menu_item->get($item['id']);
            if ($menu_item) {
                $menu_item_price = 0;

                if (isset($item['selected_variant'])) {
                    $variant = $this->menu_item->getVariant($item['id'], $item['selected_variant']);
                    if ($variant) {
                        $menu_item_price = $variant->pivot->price * $item['quantity'];
                    } else {
                        $menu_item_price = $menu_item->price * $item['quantity'];
                    }
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

                $menu_item_total_price = $menu_item_price;

                $subtotal += $menu_item_price;


                if (isset($item['selected_addons'])) {
                    foreach ($item['selected_addons'] as $selected_addon) {
                        $addon = $this->menu_item->getAddon($item['id'], $selected_addon);
                        $subtotal += $addon->pivot->price;
                        $menu_item_total_price += $addon->pivot->price;
                    }
                }

                $vat += getVat()[$menu_item->vat_category] * $menu_item_total_price;
            }
        }

        $delivery_charge = $delivery_charge * (1 + getVat()['delivery']);

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
                'menu_item_id' => $item['id'],
                'quantity' => $item['quantity'],
            ]);

            if (isset($item['show_addons'])) {
                foreach ($item['show_addons'] as $selected_addon) {
                    $selected_addon_menu_item = $this->menu_item->getSelectedAddonMenuItem($selected_addon['pivot']['menu_item_id'], $selected_addon['pivot']['addon_id']);
                    $delivery_item->addonMenuItems()->attach($selected_addon_menu_item->id);
                }
            }

            if (isset($item['show_variant'])) {
                $selected_menu_item_variant = $this->menu_item->getSelectedMenuItemVariant($item['show_variant']['pivot']['menu_item_id'], $item['show_variant']['pivot']['variant_id']);
                $delivery_item->update([
                    'menu_item_variant_id' => $selected_menu_item_variant->id
                ]);
            }
        }


        $charge = null;

        if ($request->stripeToken) {

            Stripe::setApiKey('sk_live_skoYZM5IFV0rCiRWBy25ggVB00muZnJs9E');

            $charge = Charge::create(['amount' => round($total, 2) * 100, 'currency' => 'eur', 'source' => $request->stripeToken]);
        }

        if ($charge && $request->payment == 'card') {

            $payment = [
                'type' => 'card',
                'payment' => $charge
            ];

            $delivery->update(['payment' => json_encode($payment)]);

            $delivery->user = $delivery->user()->first();

            $delivery->items = $delivery->deliveryItems()->get();

            $request->session()->remove('cart');

            $this->socket->push($delivery->attributesToArray(), 'create delivery', str_slug(config('app.name')).'_'. $request->restaurant_id);


            return redirect(route('delivery.confirm'))->with([
                'delivery' => $delivery,
                'charge' => $charge,
            ]);
        } elseif ($request->payment == 'ticket') {
            $delivery->update(['payment' => json_encode([
                'type' => 'ticket',
                'payment' => null
            ])]);

            $delivery->user = $delivery->user()->first();

            $delivery->items = $delivery->deliveryItems()->get();

            $request->session()->remove('cart');
            $request->session()->remove('requests');
            $request->session()->remove('type');
            $request->session()->remove('cart_date');
            $request->session()->remove('cart_time');
            $request->session()->remove('restaurant_id');

            $this->socket->push($delivery->attributesToArray(), 'create delivery', str_slug(config('app.name')).'_'. $request->restaurant_id);


            return redirect(route('delivery.confirm'))->with([
                'delivery' => $delivery,
                'charge' => $charge,
            ]);
        } elseif ($request->payment == 'paypal') {
            $apiContext = new ApiContext(
                new OAuthTokenCredential(
                    'AbOgfi-12BcQUx3xWa6ccwl8ZHBr3FQF0FDTRp9uQtB5z2GdCqrE_Z37aPGWqSUnsIgC2Q6GxGXdPjGO',     // ClientID
                    'EMliom_Fz7d_Cew3UgacB8_CdsCQZzG5wJX9nOmjvw-iB0K8llyl0kaO0ZQokJ-471XXWZ2xIhdn0z35'      // ClientSecret
                )
            );

            $payer = new Payer();
            $payer->setPaymentMethod("paypal");

            $amount = new Amount();
            $amount->setCurrency("EUR")
                ->setTotal(round($total, 2));
//                ->setDetails($details);

            $transaction = new Transaction();
            $transaction->setAmount($amount)
//                ->setItemList($itemList)
                ->setDescription("Payment description")
                ->setInvoiceNumber(uniqid());

            $redirectUrls = new RedirectUrls();
            $redirectUrls->setReturnUrl(route('user.delivery.paypal-success'))
                ->setCancelUrl(route('user.delivery.paypal-fail'));

            $payment = new Payment();
            $payment->setIntent("sale")
                ->setPayer($payer)
                ->setRedirectUrls($redirectUrls)
                ->setTransactions(array($transaction));

            $request_clone = clone $payment;

            try {
                $payment->create($apiContext);
            } catch (\Exception $ex) {
                dd($ex);
                exit(1);
            }

            $approvalUrl = $payment->getApprovalLink();

            $request->session()->put('delivery_id', $delivery->id);

            if ($approvalUrl) {
                return redirect($approvalUrl);
            }

        } else {
            $delivery->update(['payment' => json_encode([
                'type' => 'cash',
                'payment' => null
            ])]);

            $delivery->user = $delivery->user()->first();

            $delivery->items = $delivery->deliveryItems()->get();

            $request->session()->remove('cart');
            $request->session()->remove('requests');
            $request->session()->remove('type');
            $request->session()->remove('cart_date');
            $request->session()->remove('cart_time');
            $request->session()->remove('restaurant_id');

            $this->socket->push($delivery->attributesToArray(), 'create delivery', str_slug(config('app.name')).'_'. $request->restaurant_id);


            return redirect(route('delivery.confirm'))->with([
                'delivery' => $delivery,
                'charge' => $charge,
            ]);
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function paypalSuccess(Request $request)
    {
        $apiContext = new ApiContext(
            new OAuthTokenCredential(
                'AbOgfi-12BcQUx3xWa6ccwl8ZHBr3FQF0FDTRp9uQtB5z2GdCqrE_Z37aPGWqSUnsIgC2Q6GxGXdPjGO',     // ClientID
                'EMliom_Fz7d_Cew3UgacB8_CdsCQZzG5wJX9nOmjvw-iB0K8llyl0kaO0ZQokJ-471XXWZ2xIhdn0z35'      // ClientSecret
            )
        );

        $paymentId = $request->paymentId;
        $payment = Payment::get($paymentId, $apiContext);

        $execution = new PaymentExecution();
        $execution->setPayerId($request->PayerID);
        $transaction = new Transaction();
        $amount = new Amount();
        $details = new Details();

//        $details->setShipping(0)
//            ->setTax(0)
//            ->setSubtotal($request->amount);

        $delivery = $this->delivery->getDelivery(session('delivery_id'));

        $amount->setCurrency('EUR');
        $amount->setTotal($delivery->total);
        $amount->setDetails($details);
        $transaction->setAmount($amount);

        $execution->addTransaction($transaction);

        try {

            $result = $payment->execute($execution, $apiContext);
//                ResultPrinter::printResult("Executed Payment", "Payment", $payment->getId(), $execution, $result);

            try {
//                $payment = Payment::get($paymentId, $apiContext);

                $delivery->update(['payment' => json_encode([
                    'type' => 'paypal',
                    'payment' => $payment->getId()
                ])]);

                $delivery->user = $delivery->user()->first();

                $delivery->items = $delivery->deliveryItems()->get();

                $request->session()->remove('cart');
                $request->session()->remove('requests');
                $request->session()->remove('type');
                $request->session()->remove('cart_date');
                $request->session()->remove('cart_time');
                $request->session()->remove('restaurant_id');

                $this->socket->push($delivery->attributesToArray(), 'create delivery', str_slug(config('app.name')).'_'. $delivery->restaurant_id);

                return redirect(route('delivery.confirm'))->with([
                    'delivery' => $delivery,
                    'charge' => null,
                ]);
            } catch (\Exception $ex) {
                dd($ex);
            }
        } catch (\Exception $ex) {
            dd($ex);
        }
    }

    public function paypalFail(Request $request)
    {

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

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function confirm(Request $request)
    {
        $delivery = $request->session()->get('delivery');
        $charge = $request->session()->get('charge');

        if (!$delivery) {
            return redirect(route('user.deliveries'))->withErrors(['Your data is expired. Track your deliveries here.']);
        }

        $subtotal = 0;

        $discount = 0;

        foreach ($delivery->deliveryItems as $delivery_item) {
            if ($delivery_item->menuItem) {

                $menu_item_price = 0;

                if ($delivery_item->menuItemVariants) {
                    $menu_item_price = $delivery_item->menuItemVariants->price * $delivery_item->quantity;
                } else {
                    $menu_item_price = $delivery_item->quantity * $delivery_item->menuItem->price;
                }

                if ($delivery->menuItem) {
                    if ($delivery->menuItem->id == $delivery->menu_item_id) {
                        if ($delivery->menuItem->promo_type == 'percentage') {
                            $discount = $menu_item_price * $delivery->menuItem->promo_value * 0.01;
                        } else {
                            $discount = $delivery->menuItem->promo_value;
                        }
                    }
                }

                $subtotal += $menu_item_price;

                if ($delivery_item->addonMenuItems) {
                    foreach ($delivery_item->addonMenuItems as $addon) {
                        $addon->addon = $this->menu_item->getAddon($addon['menu_item_id'], $addon['addon_id']);
                        $subtotal += $addon->price;
                    }
                }
            }
        }

        if ($delivery->promotion) {
            if ($delivery->promotion->type == 'percentage') {
                $discount = $subtotal * $delivery->promotion->value * 0.01;
            } else {
                $discount = $delivery->promotion->value;
            }
        }
        if ($delivery->sitePromotion) {
            if ($delivery->sitePromotion->type == 'percentage') {
                $discount = $subtotal * $delivery->sitePromotion->value * 0.01;
            } else {
                $discount = $delivery->sitePromotion->value;
            }
        }

        $delivery->reduction = $discount;

        $original_time = $delivery->time;

        $delivery->time = Carbon::parse($delivery->time)->diffForHumans();

        $delivery->restaurant_discount = null;

        if ($request->session()->has('restaurant_discount')) {
            $delivery->restaurant_discount = $request->session()->get('restaurant_discount');
        }

        switch ($delivery->delivery_status) {
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

        if ($delivery->restaurant) {
            $delivery_locations = $delivery->restaurant->deliveryLocations;

            $delivery->elapsed_time = 0;

            foreach ($delivery_locations as $delivery_location) {
                if ($delivery_location->postcode == $delivery->postcode) {
                    $elapsed_time = Carbon::parse($original_time)->addMinutes($delivery_location->delivery_time)->diffForHumans();
                    if ($elapsed_time > 0 and Carbon::parse($original_time)->gt(Carbon::now())) {
                        $delivery->elapsed_time = $elapsed_time;
                    }
                }
            }
        }

        if (!$delivery->delivery_status) {
            $delivery->delivery_status = 'initiated';
        }


//        Mail::raw('Your order is received! Your order ID is: ' . $delivery->id, function ($message) use ($delivery) {
//            $message->to($delivery->user->email)->subject('Order received');
//        });

        if (\auth()->user()->email == setting('guest_email_id')) {
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

        //send verification code
        Mail::send(['html' => 'user.email.delivery-confirmed'], ['delivery' => $delivery, 'theme' => $theme],
            function ($message) use ($user_email) {
                $message->to($user_email)
                    ->subject('Order received');
            });


        return view('user.delivery.confirm', [
            'delivery' => $delivery,
            'charge' => $charge,
            'subtotal' => $subtotal,
            'progress' => $progress,
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function validateDelivery(Request $request)
    {


        $validation = [
            'address' => 'required',
            'street' => 'required',
            'city' => 'required',
//                'county' => 'required',
            'postcode' => 'required',];


        if ($request->payment == 'cash') {
            $validation['phone'] = new Telephone;
        }

        if (\auth()->user()->email == setting('guest_email_id')) {
            $validation['email'] = 'required|email';
        }

        $this->validate($request, $validation);

        $postcode = $request->postcode;

        $restaurant_id = $request->restaurant_id;

        $restaurant = $this->restaurant->getRestaurant($restaurant_id);

        $delivery_cost = 0;

        $delivery_flag = false;

        $user_delivery_location = $restaurant->deliveryLocations()->wherePostcode($postcode)->first();


        if ($user_delivery_location) {

            $delivery_flag = true;

            $total = 0;

            $delivery_cost = $user_delivery_location->delivery_cost;

            if ($request->session()->get('cart')) {
                $cart = $request->session()->get('cart');
            } else {
                return redirect(route('user.home'));
            }
            $subtotal = 0;

            $vat = 0;

            foreach ($cart as $item) {
                $menu_item = $this->menu_item->get($item['id']);
                if ($menu_item) {
                    $menu_item_price = 0;

                    if (isset($item['selected_variant'])) {
                        $variant = $this->menu_item->getVariant($item['id'], $item['selected_variant']);
                        if ($variant) {
                            $menu_item_price = $variant->pivot->price * $item['quantity'];
                        } else {
                            $menu_item_price = $menu_item->price * $item['quantity'];
                        }
                    } else {
                        $menu_item_price = $menu_item->price * $item['quantity'];
                    }

                    $subtotal += $menu_item_price;

                    $vat += getVat()[$menu_item->vat_category] * $menu_item_price;

                    if (isset($item['selected_addons'])) {
                        foreach ($item['selected_addons'] as $selected_addon) {
                            $addon = $this->menu_item->getAddon($item['id'], $selected_addon);
                            $subtotal += $addon->pivot->price;
                        }
                    }
                }
            }

//                $total = ((1 + getVat()) * $total) + $delivery_cost;
            if ($user_delivery_location->minimum_total > $subtotal) {
                return response()->json([
                    'message' => 'Your cart value must be more than £' . $user_delivery_location->minimum_total . ' to be delivered to this location.'
                ], 400);
            }
        }


        if (!$delivery_flag) {
            return response()->json([
                'message' => 'Sorry we do not delivery to this location.'
            ], 400);
        }

        return response()->json([
            'message' => 'success',
            'delivery' => $delivery_cost
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function email(Request $request)
    {
        $deliveryId = $request->delivery_id;

        $delivery = $this->delivery->getDelivery($deliveryId);

        $user_email = $request->email;

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

        Mail::send(['html' => 'user.email.delivery-confirmed'], ['delivery' => $delivery, 'theme' => $theme],
            function ($message) use ($user_email) {
                $message->to($user_email)
                    ->subject('Order received');
            });

        return response()->json([
            'message' => 'success'
        ]);

    }
}
