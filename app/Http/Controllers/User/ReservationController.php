<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Menu;
use App\Repository\ReservationRepository;
use App\Repository\RestaurantRepository;
use App\Reservation;
use App\Rules\Telephone;
use App\Setting;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

/**
 * Class ReservationController
 * @package App\Http\Controllers\User
 */
class ReservationController extends Controller
{
    protected $reservation;

    protected $restaurant;

    /**
     * ReservationController constructor.
     * @param ReservationRepository $reservation_repository
     * @param RestaurantRepository $restaurant_repository
     */
    public function __construct(ReservationRepository $reservation_repository, RestaurantRepository $restaurant_repository)
    {
        $this->reservation = $reservation_repository;
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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(Request $request)
    {

        $restaurant = $this->restaurant->getRestaurant(1);

        $user_postcode = '';

        $restaurant->opening_hours = $restaurant->openingHours()->orderBy('day', 'asc')->orderBy('opening_time', 'desc')->get();

        $menus = $restaurant->menus()->get();


        if ($restaurant->logo) {
            $restaurant->logo = getStorageUrl() . $restaurant->logo;
        } else {
            $restaurant->logo = asset('img/default.jpg');
        }

        foreach ($restaurant->media as $media) {
            if ($media->path) {
                $media->path = getStorageUrl() . $media->path;
            } else {
                $media->path = asset('img/default.jpg');
            }
        }

        $popular = Menu::hydrate([[
            'id' => 0,
            'restaurant_id' => $restaurant->id,
            'name' => 'Popular',
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString(),
            'deleted_at' => null
        ]])->first();

        $popular->selected = true;

        $popular->menu_items = $this->restaurant->getPopularItems($restaurant->id);

        $restaurant_menus = [];
        if ($popular->menu_items->count()) {
            $restaurant_menus[] = $popular;
        }
        foreach ($menus as $menu) {
            if ($menu->name != 'Popular') {
                $menu->menu_items = $menu->menuItems()->whereNull('deleted')->get();
                $menu->selected = false;
                $restaurant_menus[] = $menu;
            }
        }

        $restaurant->menus = $restaurant_menus;


        foreach ($restaurant->menus as $menu) {
            foreach ($menu->menu_items as $menu_item) {

                if ($menu_item->logo) {
                    $menu_item->logo = getStorageUrl() . $menu_item->logo;
                } else {
                    $menu_item->logo = asset('img/default.jpg');
                }

                $menu_item->variants = $menu_item->variants()->get();

                foreach ($menu_item->variants as $variant_key => $variant) {
                    $variant->pivot = $variant->pivot;
                    if ($variant_key == 0) {
                        $variant->selected = true;
                    } else {
                        $variant->selected = false;
                    }
                }

                $menu_item->addons = $menu_item->addons()->get();

                foreach ($menu_item->addons as $addon) {
                    $addon->selected = false;
                    $addon->pivot = $addon->pivot;
                }

                $delivery_count = $menu_item->deliveries()->count() + $menu_item->takeaways()->count();

                $menu_item->promotion_validate = false;

                if (Carbon::parse($menu_item->promo_date)->gte(Carbon::now()) && $delivery_count <= $menu_item->promo_usage && $menu_item->promo_code) {
                    $menu_item->promotion_validate = true;
                }

                $menu_item->favoured = false;

                if ($menu_item->users()->where('user_id', '=', Auth::id())->count()) {
                    $menu_item->favoured = true;
                }
            }
        }

        $reviews = $restaurant->reviews()->orderBy('created_at', 'desc')->get();

        $total = 0;
        $count = 0;

        $rating_values = [
            '1' => 0,
            '2' => 0,
            '3' => 0,
            '4' => 0,
            '5' => 0,
        ];

        foreach ($reviews as $review) {
            $total += $review->rating;
            $count++;
            $rating_values[$review->rating]++;
            $review->updated_date = Carbon::parse($review->updated_at)->diffForHumans();
        }

        $percentages = [
            '1' => 0,
            '2' => 0,
            '3' => 0,
            '4' => 0,
            '5' => 0,
        ];
        if ($count) {
            foreach ($rating_values as $key => $rating_value) {
                $percentages[$key] = $rating_value * 100 / $count;
            }
        } else {
            foreach ($rating_values as $key => $rating_value) {
                $percentages[$key] = 0;
            }
        }
        if ($total && $count) {
            $restaurant->rating = number_format($total / $count, 0, '.', '');
        } else {
            $restaurant->rating = 5;
        }

        $restaurant->percentages = $percentages;


        $restaurant->pre_order_time = '';

        foreach ($restaurant->opening_hours as $opening_key => $opening_hour) {

            $now = Carbon::now();

            $opening_hour_day = $opening_hour->day;

            if (Carbon::SUNDAY == $opening_hour->day) {
                $opening_hour->day = __('Sunday');
            }
            if (Carbon::MONDAY == $opening_hour->day) {
                $opening_hour->day = __('Monday');
            }
            if (Carbon::TUESDAY == $opening_hour->day) {
                $opening_hour->day = __('Tuesday');
            }
            if (Carbon::WEDNESDAY == $opening_hour->day) {
                $opening_hour->day = __('Wednesday');
            }
            if (Carbon::THURSDAY == $opening_hour->day) {
                $opening_hour->day = __('Thursday');
            }
            if (Carbon::FRIDAY == $opening_hour->day) {
                $opening_hour->day = __('Friday');
            }
            if (Carbon::SATURDAY == $opening_hour->day) {
                $opening_hour->day = __('Saturday');
            }

            $opening = Carbon::parse($opening_hour->opening_time);

            $opening_hour->opening = $opening->format('h:i A');

            $closing = Carbon::parse($opening_hour->closing_time);

            $opening_hour->closing = $closing->format('h:i A');

            if ($now->dayOfWeek == $opening_hour_day) {
                if ($now->lt($opening)) {
                    $restaurant->pre_order_time = 'Opening at ' . $opening->format('h:i A');
                }

                if ($now->gt($closing)) {
                    if (count($restaurant->opening_hours) == $opening_key + 1) {
                        $restaurant->pre_order_time = 'Opening in ' . $opening_hour->day . ' ' . $restaurant->opening_hours[0]->opening;
                    } else {
                        if (Carbon::SUNDAY == $restaurant->opening_hours[$opening_key + 1]->day) {
                            $next_day = __('Sunday');
                        }
                        if (Carbon::MONDAY == $restaurant->opening_hours[$opening_key + 1]->day) {
                            $next_day = __('Monday');
                        }
                        if (Carbon::TUESDAY == $restaurant->opening_hours[$opening_key + 1]->day) {
                            $next_day = __('Tuesday');
                        }
                        if (Carbon::WEDNESDAY == $restaurant->opening_hours[$opening_key + 1]->day) {
                            $next_day = __('Wednesday');
                        }
                        if (Carbon::THURSDAY == $restaurant->opening_hours[$opening_key + 1]->day) {
                            $next_day = __('Thursday');
                        }
                        if (Carbon::FRIDAY == $restaurant->opening_hours[$opening_key + 1]->day) {
                            $next_day = __('Friday');
                        }
                        if (Carbon::SATURDAY == $restaurant->opening_hours[$opening_key + 1]->day) {
                            $next_day = __('Saturday');
                        }

                        if ($restaurant->opening_hours[$opening_key + 1]->day == $now->addDay()->dayOfWeek) {
                            $restaurant->pre_order_time = 'Pre order opening at tomorrow ' . $opening_hour->opening;
                        } else {
                            $restaurant->pre_order_time = 'Pre order opening at ' . $next_day . ' ' . $opening_hour->opening;
                        }
                    }
                }
                if ($now->lt($closing) && $now->gt($opening)) {
                    $restaurant->pre_order_time = 'Open';
                }

                if ($now->lt($closing) && $now->gt($closing->subHour())) {
                    $restaurant->pre_order_time = 'Closing at ' . $closing->addHour()->format('h:i A');
                }
            }
        }


        $restaurant->reviews = $reviews;

        foreach ($restaurant->reviews as $review) {
            $review->user = $review->user()->first();
            $review->date = Carbon::parse($review->created_at)->diffForHumans();
        }


        if (Auth::check()) {
            $restaurant->user = $restaurant->users()->where('user_id', '=', Auth::id())->first();
        } else {
            $restaurant->user = false;
        }

        $restaurant_address = $restaurant->name . '+' . $restaurant->city . '+' . $restaurant->province . '+' . $restaurant->county . '+' . $restaurant->postcode;

        $restaurant->query_address = str_replace(' ', '+', $restaurant_address);

        $PublicIP = $request->ip();
        $json = file_get_contents("http://ipinfo.io/$PublicIP/geo?token=".config('services.ip_info_token'));
        $json = json_decode($json, true);

        if (isset($json['city']) && isset($json['region']) && isset($json['country'])) {
            $user_address = $json['city'] . ', ' . $json['region'] . ', ' . $json['country'];
        } else {
            $user_address = 'null';
        }

        if (session('latitude') && session('longitude')) {
            $user_address = session('latitude') . ', ' . session('longitude');
        }

        if (isset($json['postal'])) {
            $user_postcode = $json['postal'];
        }

        if (Auth::check()) {
            if (Auth::user()->addresses()->count()) {
                $user_address = Auth::user()->addresses()->where('default', '=', true)->first();
                if ($user_address) {
                    $default_address = $user_address->address . ', ' . $user_address->street . ', ' . $user_address->city . ', ' . $user_address->county . ' ' . $user_address->postcode;
                    $user_postcode = $user_address->postcode;
                }
            }
        }


        if ($request->session()->get('cart')) {
            $cart = $request->session()->get('cart');
        } else {
            $cart = [];
        }

        if ($request->session()->get('requests')) {
            $requests = $request->session()->get('requests');
        } else {
            $requests = '';
        }

        if ($request->session()->get('type')) {
            $type = $request->session()->get('type');
        } else {
            $type = 'delivery';
        }

//        if ($request->session()->get('cart_date')) {
//            $cart_date = $request->session()->get('cart_date');
//        } else {
        $cart_date = Carbon::now()->toDateString();
//        }

//        if ($request->session()->get('cart_time')) {
//            $cart_time = $request->session()->get('cart_time');
//        } else {
        $cart_time = Carbon::now()->addMinutes($restaurant->clock_minutes)->addMinute()->format('h:i A');
//        }

        if ($request->session()->get('restaurant_id')) {
            $restaurant_id = $request->session()->get('restaurant_id');
        } else {
            $restaurant_id = 0;
        }


        if ($request->type) {
            $type = $request->type;
        }

        return view('user.reservation.create', [
            'restaurant' => $restaurant,
            'cart' => $cart,
            'requests' => $requests,
            'type' => $type,
            'cart_date' => $cart_date,
            'cart_time' => $cart_time,
            'restaurant_id' => $restaurant_id,
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $validation = [
            'head_count' => 'required|min:1|integer',
            'date' => 'required',
            'time' => 'required',
        ];

        if (\auth()->user()->email == setting('guest_email_id')) {
            $validation['phone'] = new Telephone;
            $validation['email'] = 'required|email';
        }

        $this->validate($request, $validation);

        $restaurant = $this->restaurant->getRestaurant($request->restaurant_id);

//        $date = Carbon::parse($request->date);
//        $time = Carbon::parse($request->time);

//        foreach ($restaurant->openingHours()->orderBy('day', 'asc')->orderBy('opening_time', 'desc')->get() as $opening_hour) {
//            if ($opening_hour->day == $date->dayOfWeek) {
//                $opening_time = Carbon::parse($opening_hour->opening_time);
//                $closing_time = Carbon::parse($opening_hour->closing_time);
//                if ($opening_time->gt($time) || $closing_time->lt($time)) {
//                    return response()->json([
//                        'status' => 'error',
//                        'message' => 'Please select a time between opening and closing time of the restaurant!'
//                    ], 400);
//                }
//            }
//        }

        $cart_date = Carbon::parse($request->date . ' ' . $request->time);

//        new code
//        new code
//        new code

        $day_flag = true;

        foreach ($restaurant->openingHours()->orderBy('day', 'asc')->orderBy('opening_time', 'desc')->get() as $opening_hour) {
            if ($opening_hour->day == $cart_date->dayOfWeek) {
                $cart_time = Carbon::parse($cart_date->toTimeString());
                $opening_time = Carbon::parse($opening_hour->opening_time);
                $closing_time = Carbon::parse($opening_hour->closing_time);
                if ($cart_time->gt($opening_time) && $cart_time->lt($closing_time)) {
                    $day_flag = false;
                }
            }
        }

        if ($day_flag) {
            return response()->json([
                'message' => 'Sorry please set order time within opening hours'
            ], 400);
        }

//        new code
//        new code
//        new code

        $request->request->set('user_id', Auth::id());

        $request->request->set('time', Carbon::parse($request->date . ' ' . $request->time)->toDateTimeString());

        $reservation = $this->reservation->create($request->all());

        $reservation->date = Carbon::parse($reservation->time)->toFormattedDateString();

        $reservation->time = Carbon::parse($reservation->time)->format('g:i A');

        $setting = Setting::first();

        $restaurant->promo_range = false;
        $setting->promo_range = false;

        if ($restaurant->promocode && Carbon::now()->startOfDay()->lte(Carbon::parse($restaurant->expiry_date)->startOfDay()) && Carbon::now()->startOfDay()->gte(Carbon::parse($restaurant->start_date)->startOfDay())) {
            $restaurant->promo_range = true;
        }

        if ($setting->promocode && Carbon::now()->startOfDay()->lte(Carbon::parse($setting->expiry_date)->startOfDay()) && Carbon::now()->startOfDay()->gte(Carbon::parse($setting->start_date)->startOfDay())) {
            $setting->promo_range = true;
        }

        if ($reservation) {
            return response()->json([
                'message' => 'success',
                'data' => [
                    'reservation' => $reservation,
                    'restaurant' => $restaurant,
                    'setting' => $setting
                ]
            ]);
        } else {
            return response()->json([
                'message' => 'failed'
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Reservation $reservation
     * @return \Illuminate\Http\Response
     */
    public function show(Reservation $reservation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Reservation $reservation
     * @return \Illuminate\Http\Response
     */
    public function edit(Reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Reservation $reservation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reservation $reservation)
    {
        $update = $reservation->update($request->all());

        $request->session()->flash('reservation_id', $reservation->id);

//        Mail::raw('Your booking is received! Your booking ID is: ' . $reservation->id, function ($message) use ($reservation) {
//            $message->to($reservation->user->email)->subject('Booking received');
//        });

        if (\auth()->user()->email == setting('guest_email_id')) {
            $user_email = $reservation->email;
        } else {
            $user_email = $reservation->user->email;
        }

        $restaurant = $reservation->restaurant()->first();
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
        Mail::send(['html' => 'user.email.reservation-confirmed'], ['reservation' => $reservation, 'theme' => $theme],
            function ($message) use ($user_email) {
                $message->to($user_email)
                    ->subject('Booking received');
            });

        if ($update) {
            return response()->json([
                'message' => 'success',
                'data' => [
                    'reservation' => $update
                ]
            ]);
        } else {
            return response()->json([
                'message' => 'failed'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Reservation $reservation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservation $reservation)
    {
        //
    }

    public function email(Request $request)
    {
        $reservationId = $request->reservation_id;

        $reservation = $this->reservation->get($reservationId);

        $user_email = $request->email;

        $restaurant = $reservation->restaurant()->first();
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

        Mail::send(['html' => 'user.email.reservation-confirmed'], ['reservation' => $reservation, 'theme' => $theme],
            function ($message) use ($user_email) {
                $message->to($user_email)
                    ->subject('Booking received');
            });

        return response()->json([
            'message' => 'success'
        ]);

    }
}
