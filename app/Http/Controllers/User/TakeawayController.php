<?php

namespace App\Http\Controllers\User;

use App\Repository\MenuItemRepository;
use App\Repository\RestaurantRepository;
use App\Repository\TakeawayRepository;
use App\Rules\Telephone;
use App\Setting;
use App\Support\Socket;
use App\Takeaway;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
 * Class TakeawayController
 * @package App\Http\Controllers\User
 */
class TakeawayController extends Controller
{

    protected $takeaway;

    protected $socket;

    protected $menu_item;

    protected $restaurant;

    /**
     * TakeawayController constructor.
     * @param TakeawayRepository $takeaway_repository
     * @param Socket $socket
     * @param MenuItemRepository $menu_item_repository
     * @param RestaurantRepository $restaurant_repository
     */
    public function __construct(TakeawayRepository $takeaway_repository, Socket $socket, MenuItemRepository $menu_item_repository, RestaurantRepository $restaurant_repository)
    {
        $this->takeaway = $takeaway_repository;
        $this->socket = $socket;
        $this->menu_item = $menu_item_repository;
        $this->restaurant = $restaurant_repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function create(Request $request)
    {
        $user = Auth::user();
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
        $setting = Setting::first();

        $restaurant->promo_range = false;
        $setting->promo_range = false;

        if (Carbon::now()->startOfDay()->lte(Carbon::parse($restaurant->expiry_date)->startOfDay()) && Carbon::now()->startOfDay()->gte(Carbon::parse($restaurant->start_date)->startOfDay())) {
            $restaurant->promo_range = true;
        }

        if (Carbon::now()->startOfDay()->lte(Carbon::parse($setting->expiry_date)->startOfDay()) && Carbon::now()->startOfDay()->gte(Carbon::parse($setting->start_date)->startOfDay())) {
            $setting->promo_range = true;
        }


        return view('user.takeaway.create', [
            'user' => $user,
            'cart' => $cart,
            'requests' => $requests,
            'restaurant' => $restaurant,
            'setting' => $setting
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Pusher\PusherException
     */
    public function store(Request $request)
    {
        $validation = [];

        if (\auth()->user()->email == setting('guest_email_id')) {
            $validation['email'] = 'required|email';
        }


        $this->validate($request, $validation);

        $promotion = json_decode($request->promotion);

        $request->request->set('user_id', Auth::id());

//        $request->request->set('time', Carbon::now()->toDateTimeString());

        $request->request->set('time', Carbon::parse($request->date . ' ' . $request->time)->toDateTimeString());

        $restaurant = $this->restaurant->getRestaurant($request->restaurant_id);


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

        $request->request->set('vat', $vat);

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

        $total = $subtotal + $vat - $discount - $site_discount - $restaurant_discount;

        $request->request->set('total', $total);

        $takeaway = $this->takeaway->create($request->all());

        foreach ($cart as $item) {
            $takeaway_item = $this->takeaway->createTakeawayItem([
                'takeaway_id' => $takeaway->id,
                'menu_item_id' => $item['id'],
                'quantity' => $item['quantity'],
            ]);

            if (isset($item['show_addons'])) {
                foreach ($item['show_addons'] as $selected_addon) {
                    $selected_addon_menu_item = $this->menu_item->getSelectedAddonMenuItem($selected_addon['pivot']['menu_item_id'], $selected_addon['pivot']['addon_id']);
                    $takeaway_item->addonMenuItems()->attach($selected_addon_menu_item->id);
                }
            }

            if (isset($item['show_variant'])) {
                $selected_menu_item_variant = $this->menu_item->getSelectedMenuItemVariant($item['show_variant']['pivot']['menu_item_id'], $item['show_variant']['pivot']['variant_id']);
                $takeaway_item->update([
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

            $takeaway->update(['payment' => json_encode($payment)]);

            $takeaway->user = $takeaway->user()->first();

            $takeaway->items = $takeaway->takeawayItems()->get();

            $request->session()->remove('cart');

            $this->socket->push($takeaway->attributesToArray(), 'create takeaway', str_slug(config('app.name')).'_'. $request->restaurant_id);


            return redirect(route('takeaway.confirm'))->with([
                'takeaway' => $takeaway,
                'charge' => $charge,
            ]);
        } elseif ($request->payment == 'ticket') {
            $takeaway->update(['payment' => json_encode([
                'type' => 'ticket',
                'payment' => null
            ])]);

            $takeaway->user = $takeaway->user()->first();

            $takeaway->items = $takeaway->takeawayItems()->get();

            $request->session()->remove('cart');
            $request->session()->remove('requests');
            $request->session()->remove('type');
            $request->session()->remove('cart_date');
            $request->session()->remove('cart_time');
            $request->session()->remove('restaurant_id');

            $this->socket->push($takeaway->attributesToArray(), 'create takeaway', str_slug(config('app.name')).'_'. $request->restaurant_id);


            return redirect(route('takeaway.confirm'))->with([
                'takeaway' => $takeaway,
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

//            $items = [];
//
//            foreach ($cart as $item) {
//                $item_object = new Item();
//                $item_object->setName($item['id'])
//                    ->setCurrency('EUR')
//                    ->setQuantity((int)$item['quantity'])
//                    ->setSku($item['id'])// Similar to `item_number` in Classic API
//                    ->setPrice(1);
//                $items[] = $item_object;
//            }
//
//
//            $itemList = new ItemList();
//            $itemList->setItems($items);

//            $details = new Details();
//            $details->setShipping(round($takeaway_charge, 2))
//                ->setTax(round(getVat() * $subtotal, 2))
//                ->setSubtotal(round($subtotal, 2));

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
            $redirectUrls->setReturnUrl(route('user.takeaway.paypal-success'))
                ->setCancelUrl(route('user.takeaway.paypal-fail'));

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

            $request->session()->put('takeaway_id', $takeaway->id);

            if ($approvalUrl) {
                return redirect($approvalUrl);
            }

        } else {
            $takeaway->update(['payment' => json_encode([
                'type' => 'cash',
                'payment' => null
            ])]);

            $takeaway->user = $takeaway->user()->first();

            $takeaway->items = $takeaway->takeawayItems()->get();

            $request->session()->remove('cart');
            $request->session()->remove('requests');
            $request->session()->remove('type');
            $request->session()->remove('cart_date');
            $request->session()->remove('cart_time');
            $request->session()->remove('restaurant_id');

            $this->socket->push($takeaway->attributesToArray(), 'create takeaway', str_slug(config('app.name')).'_'. $request->restaurant_id);


            return redirect(route('takeaway.confirm'))->with([
                'takeaway' => $takeaway,
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

        $takeaway = $this->takeaway->getTakeaway(session('takeaway_id'));

        $amount->setCurrency('EUR');
        $amount->setTotal($takeaway->total);
        $amount->setDetails($details);
        $transaction->setAmount($amount);

        $execution->addTransaction($transaction);

        try {

            $result = $payment->execute($execution, $apiContext);
//                ResultPrinter::printResult("Executed Payment", "Payment", $payment->getId(), $execution, $result);

            try {
//                $payment = Payment::get($paymentId, $apiContext);

                $takeaway->update(['payment' => json_encode([
                    'type' => 'paypal',
                    'payment' => $payment->getId()
                ])]);

                $takeaway->user = $takeaway->user()->first();

                $takeaway->items = $takeaway->takeawayItems()->get();

                $request->session()->remove('cart');
                $request->session()->remove('requests');
                $request->session()->remove('type');
                $request->session()->remove('cart_date');
                $request->session()->remove('cart_time');
                $request->session()->remove('restaurant_id');

                $this->socket->push($takeaway->attributesToArray(), 'create takeaway', str_slug(config('app.name')).'_'. $takeaway->restaurant_id);

                return redirect(route('takeaway.confirm'))->with([
                    'takeaway' => $takeaway,
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
     * @param \App\Takeaway $takeaway
     * @return \Illuminate\Http\Response
     */
    public function show(Takeaway $takeaway)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Takeaway $takeaway
     * @return \Illuminate\Http\Response
     */
    public function edit(Takeaway $takeaway)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Takeaway $takeaway
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Takeaway $takeaway)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Takeaway $takeaway
     * @return \Illuminate\Http\Response
     */
    public function destroy(Takeaway $takeaway)
    {
        //
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function confirm(Request $request)
    {
        $takeaway = $request->session()->get('takeaway');
        $charge = $request->session()->get('charge');

        if (!$takeaway) {
            return redirect(route('user.takeaways'))->withErrors(['Your data is expired. Track your takeaways here.']);
        }

        $subtotal = 0;

        $discount = 0;

        foreach ($takeaway->takeawayItems as $takeaway_item) {
            if ($takeaway_item->menuItem) {

                $menu_item_price = 0;

                if ($takeaway_item->menuItemVariants) {
                    $menu_item_price += $takeaway_item->menuItemVariants->price * $takeaway_item->quantity;
                } else {
                    $menu_item_price += $takeaway_item->quantity * $takeaway_item->menuItem->price;
                }

                if ($takeaway->menuItem) {
                    if ($takeaway->menuItem->id == $takeaway->menu_item_id) {
                        if ($takeaway->menuItem->promo_type == 'percentage') {
                            $discount = $menu_item_price * $takeaway->menuItem->promo_value * 0.01;
                        } else {
                            $discount = $takeaway->menuItem->promo_value;
                        }
                    }
                }

                $subtotal += $menu_item_price;


                if ($takeaway_item->addonMenuItems) {
                    foreach ($takeaway_item->addonMenuItems as $addon) {
                        $addon->addon = $this->menu_item->getAddon($addon['menu_item_id'], $addon['addon_id']);
                        $subtotal += $addon->addon->price;
                    }
                }
            }
        }

        if ($takeaway->promotion) {
            if ($takeaway->promotion->type == 'percentage') {
                $discount = $subtotal * $takeaway->promotion->value * 0.01;
            } else {
                $discount = $takeaway->promotion->value;
            }
        }
        if ($takeaway->sitePromotion) {
            if ($takeaway->sitePromotion->type == 'percentage') {
                $discount = $subtotal * $takeaway->sitePromotion->value * 0.01;
            } else {
                $discount = $takeaway->sitePromotion->value;
            }
        }

        $takeaway->reduction = $discount;

        $original_time = $takeaway->time;

        $takeaway->time = Carbon::parse($takeaway->time)->diffForHumans();

        $takeaway->restaurant_discount = null;

        if ($request->session()->has('restaurant_discount')) {
            $takeaway->restaurant_discount = $request->session()->get('restaurant_discount');
        }

        switch ($takeaway->takeaway_status) {
            case 'initiated':
                $progress = 12;
                break;
            case 'approved':
                $progress = 25;
                break;
            case 'dispatched':
                $progress = 50;
                break;
            case 'collected':
                $progress = 88;
                break;
            default:
                $progress = 12;
                break;
        }


        if ($takeaway->restaurant) {
            $takeaway_locations = $takeaway->restaurant->takeawayLocations;

            $takeaway->elapsed_time = 0;

            foreach ($takeaway_locations as $takeaway_location) {
                if ($takeaway_location->postcode == $takeaway->postcode) {
                    $elapsed_time = Carbon::parse($original_time)->addMinutes($takeaway_location->takeaway_time)->diffForHumans();
                    if ($elapsed_time > 0 and Carbon::parse($original_time)->gt(Carbon::now())) {
                        $takeaway->elapsed_time = $elapsed_time;
                    }
                }
            }
        }

        if (!$takeaway->takeaway_status) {
            $takeaway->takeaway_status = 'initiated';
        }

//        Mail::raw('Your order is received! Your order ID is: ' . $takeaway->id, function ($message) use ($takeaway) {
//            $message->to($takeaway->user->email)->subject('Order received');
//        });

        if (\auth()->user()->email == setting('guest_email_id')) {
            $user_email = $takeaway->email;
        } else {
            $user_email = $takeaway->user->email;
        }

        $restaurant = $takeaway->restaurant()->first();
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
        Mail::send(['html' => 'user.email.takeaway-confirmed'], ['takeaway' => $takeaway, 'theme' => $theme],
            function ($message) use ($user_email) {
                $message->to($user_email)
                    ->subject('Order received');
            });

        return view('user.takeaway.confirm', [
            'takeaway' => $takeaway,
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
    public function validateTakeaway(Request $request)
    {

        $validation = [];

        if ($request->payment == 'cash') {
            $validation['phone'] = new Telephone;
        }

        if (\auth()->user()->email == setting('guest_email_id')) {
            $validation['email'] = 'required|email';
        }

        $this->validate($request, $validation);


        return response()->json([
            'message' => 'success',
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function email(Request $request)
    {
        $takeawayId = $request->takeaway_id;

        $takeaway = $this->takeaway->getTakeaway($takeawayId);

        $user_email = $request->email;

        $restaurant = $takeaway->restaurant()->first();
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

        Mail::send(['html' => 'user.email.takeaway-confirmed'], ['takeaway' => $takeaway, 'theme' => $theme],
            function ($message) use ($user_email) {
                $message->to($user_email)
                    ->subject('Order received');
            });

        return response()->json([
            'message' => 'success'
        ]);

    }
}
