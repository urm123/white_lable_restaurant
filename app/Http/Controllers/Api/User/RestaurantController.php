<?php

namespace App\Http\Controllers\Api\User;

use App\Menu;
use App\Repository\PaymentMethodRepository;
use App\Repository\RestaurantRepository;
use App\Restaurant;
use App\Support\Geolocation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

/**
 * Class RestaurantController
 * @package App\Http\Controllers\Api\User
 */
class RestaurantController extends Controller
{
    protected $restaurant;

    protected $geolocation;

    protected $payment_method;

    /**
     * RestaurantController constructor.
     * @param RestaurantRepository $restaurant_repository
     * @param Geolocation $geolocation
     * @param PaymentMethodRepository $payment_method_repository
     */
    public function __construct(RestaurantRepository $restaurant_repository, Geolocation $geolocation, PaymentMethodRepository $payment_method_repository)
    {
        $this->restaurant = $restaurant_repository;
        $this->geolocation = $geolocation;
        $this->payment_method = $payment_method_repository;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse0
     */
    public function index(Request $request)
    {
        $type = $request->type;

        $PublicIP = $request->ip();
        $json = file_get_contents("http://ipinfo.io/$PublicIP/geo?token=".config('services.ip_info_token'));
        $json = json_decode($json, true);

        $postcode = $request->postcode;

        if (isset($json['city']) && isset($json['region']) && isset($json['country'])) {
            $user_address = $json['city'] . ', ' . $json['region'] . ', ' . $json['country'];
        } else {
            $user_address = 'null';
        }

        switch ($type) {
            case 'interests':
                if (Auth::check()) {
                    $restaurants = $this->restaurant->getInterestingRestaurants(Auth::id());
                } else {
                    $restaurants = $this->restaurant->allByPostcode($postcode);
                }
                break;
            case 'recommended':
                $restaurants = $this->restaurant->allByPostcode($postcode);
                break;
            case 'popular':
                $restaurants = [];
                $all_restaurants = $this->restaurant->getPopularRestaurants();
                foreach ($all_restaurants as $restaurant) {
                    $restaurant_address = $restaurant->name . ', ' . $restaurant->city . ', ' . $restaurant->province . ', ' . $restaurant->county . ' ' . $restaurant->postcode;

                    $restaurant->distance = $this->geolocation->getDistance($restaurant_address, $user_address);
                    if ($restaurant->distance < 20) {
                        $restaurants[] = $restaurant;
                    }
                }
                break;
            default:
                $restaurants = $this->restaurant->all();
                break;
        }

        foreach ($restaurants as $key => $restaurant) {
            $reviews = $restaurant->reviews()->get();

            $restaurant->logo = getStorageUrl() . $restaurant->logo;

            $restaurant->sort = $key;

            $restaurant->price_range = $restaurant->price_range + 1;


            $total = 0;
            $count = 0;

            foreach ($reviews as $review) {
                $total += $review->rating;
                $count++;
            }

            if ($total && $count) {
                $restaurant->rating = number_format($total / $count, 0, '.', '');
            } else {
                $restaurant->rating = 5;
            }

            if (Auth::check()) {
                if (Auth::user()->addresses()->count()) {
                    $user_address = Auth::user()->addresses()->where('default', '=', true)->first();
                    if ($user_address) {
                        $default_address = $user_address->street . ', ' . $user_address->city . ', ' . $user_address->county . ' ' . $user_address->postcode;
                        $restaurant_address = $restaurant->name . ', ' . $restaurant->city . ', ' . $restaurant->province . ', ' . $restaurant->county . ' ' . $restaurant->postcode;
                        $this->geolocation->getDistance($restaurant_address, $default_address);
                    }
                }
            }
//
//            $user_postcode = $this->geolocation->getPostCode($user_address);
//
//            if (Auth::check()) {
//                if (Auth::user()->addresses()->where('default', '=', true)->first()) {
//                    $user_postcode = Auth::user()->addresses()->where('default', '=', true)->first()->postcode;
//                }
//            }

            $restaurant->delivery_locations = $restaurant->deliveryLocations()->get();

            $restaurant->cuisines = $restaurant->cuisines()->get();

            $restaurant->reviews = [];
        }

        return response()->json([
            'message' => 'success',
            'data' => [
                'restaurants' => $restaurants
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
     * @param \App\Restaurant $restaurant
     * @return \Illuminate\Http\Response
     */
    public function show(Restaurant $restaurant, Request $request)
    {
        $restaurant->opening_hours = $restaurant->openingHours()->get();

        $reviews = $restaurant->reviews()->get();

        $restaurant->url = route('user.restaurant.menu');

        $restaurant->logo = getStorageUrl() . $restaurant->logo;

        $restaurant->cuisines = $restaurant->cuisines()->get();

        $restaurant->delivery_locations = $restaurant->deliveryLocations()->get();

        $restaurant->price_range = $restaurant->price_range + 1;

        $menus = $restaurant->menus()->get();

        foreach ($restaurant->media as $media) {
            $media->path = getStorageUrl() . $media->path;
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

        $total = 0;
        $count = 0;

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
                $menu_item->logo = getStorageUrl() . $menu_item->logo;
                $menu_item->variants = $menu_item->variants()->get();
                $menu_item->addons = $menu_item->addons()->get();
            }
        }

        foreach ($reviews as $review) {
            $total += $review->rating;
            $count++;
        }

        if ($total && $count) {
            $restaurant->rating = number_format($total / $count, 0, '.', '');
        } else {
            $restaurant->rating = 5;
        }

        $restaurant->review_count = count($reviews);

        $now = Carbon::now();

        $restaurant->delivery_locations = $restaurant->deliveryLocations()->get();

        $restaurant->pre_order_time = '';

        foreach ($restaurant->opening_hours as $opening_key => $opening_hour) {

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


        if (\request()->user('api')) {
            $restaurant_user = $restaurant->users()->where('user_id', '=', \request()->user('api')->id)->first();
            if ($restaurant_user) {
                $restaurant->user = true;
            } else {
                $restaurant->user = false;
            }
        } else {
            $restaurant->user = false;
        }

        $restaurant_address = $restaurant->city . '+' . $restaurant->province . '+' . $restaurant->county . '+' . $restaurant->postcode;

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

        if (Auth::check()) {
            if (Auth::user()->addresses()->count()) {
                $user_address = Auth::user()->addresses()->where('default', '=', true)->first();
                if ($user_address) {
                    $default_address = $user_address->street . ', ' . $user_address->city . ', ' . $user_address->county . ' ' . $user_address->postcode;
                    $restaurant_address = $restaurant->name . ', ' . $restaurant->city . ', ' . $restaurant->province . ', ' . $restaurant->county . ' ' . $restaurant->postcode;
                    $this->geolocation->getDistance($restaurant_address, $default_address);
                }
            }
        }

        $user_postcode = $this->geolocation->getPostCode($user_address);

        if ($request->postcode) {
            $user_postcode = $request->postocde;
        }

        $restaurant->free_delivery = false;
        $restaurant->delivery_time = '';
        $restaurant->minimum_total = 0;

        $restaurant->delivery_minutes = 30;

        $restaurant->current_time = Carbon::now()->toDateTimeString();

        foreach ($restaurant->deliveryLocations as $delivery_location) {
            if ($delivery_location->postcode == $user_postcode) {
                $restaurant->delivery_minutes = $delivery_location->delivery_time;
                $restaurant->delivery_time = $delivery_location->delivery_time . ' mins';
                $restaurant->free_delivery = $delivery_location->free_delivery;
                $restaurant->minimum_total = 'above ' . $delivery_location->minimum_total;
            }
        }

        $restaurant->clock_minutes = $restaurant->delivery_minutes + 1;

        $areas = [];

        foreach ($restaurant->deliveryLocations as $delivery_location) {
            $areas[] = $delivery_location;
        }

        foreach ($restaurant->takeawayLocations()->get() as $takeaway_location) {

            $takeaway_location->selected = true;

            foreach ($areas as $area) {
                if ($area->postcode == $takeaway_location->postcode) {
                    $takeaway_location->selected = false;
                }
            }
        }

        foreach ($restaurant->takeawayLocations as $takeaway_location) {
            if ($takeaway_location->selected) {
                $areas[] = $takeaway_location;
            }
        }

        $restaurant->areas = $areas;

        $payment_methods = $this->payment_method->all();

        $cart_date = Carbon::now()->toDateString();

        $cart_time = Carbon::now()->addMinutes($restaurant->clock_minutes)->addMinute()->format('h:i A');

        return response()->json([
            'message' => 'success',
            'data' => [
                'restaurant' => $restaurant,
                'payment_methods' => $payment_methods,
                'cart_date' => $cart_date,
                'cart_time' => $cart_time,
            ]
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Restaurant $restaurant
     * @return \Illuminate\Http\Response
     */
    public function edit(Restaurant $restaurant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Restaurant $restaurant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Restaurant $restaurant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Restaurant $restaurant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurant $restaurant)
    {
        //
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function favourite(Request $request)
    {

        $restaurant_id = $request->restaurant_id;

        $restaurant = $this->restaurant->getRestaurant($restaurant_id);

        $restaurant->price_range = $restaurant->price_range + 1;

        $user_id = Auth::id();

        $restaurant_user = $restaurant->users()->where('user_id', '=', $user_id)->first();

        if ($restaurant_user) {
            $restaurant_user_result = $restaurant->users()->where('user_id', '=', $user_id)->detach();
        } else {
            $restaurant_user_result = $restaurant->users()->attach($user_id);
        }

        if (!$restaurant_user_result) {
            return response()->json([
                'message' => 'Successfully added to favourites list'
            ]);
        } else {
            return response()->json([
                'message' => 'Successfully removed from favourites list'
            ]);
        }
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function favourites()
    {
        $user = Auth::user();

        foreach ($user->restaurants as $restaurant) {

            $restaurant->logo = getStorageUrl() . $restaurant->logo;
            $restaurant->price_range = $restaurant->price_range + 1;


            $total = 0;
            $count = 0;

            foreach ($restaurant->reviews as $review) {
                $total += $review->rating;
                $count++;
            }

            if ($total && $count) {
                $restaurant->rating = number_format($total / $count, 0, '.', '');
            } else {
                $restaurant->rating = 5;
            }
        }

        if ($user) {
            return response()->json([
                'message' => 'success',
                'data' => [
                    'restaurants' => $user->restaurants
                ]
            ]);

        } else {
            return response()->json([
                'message' => 'failed'
            ], 400);
        }


    }
}
