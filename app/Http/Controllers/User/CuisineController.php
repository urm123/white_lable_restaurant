<?php

namespace App\Http\Controllers\User;

use App\Cuisine;
use App\Repository\CuisineRepository;
use App\Repository\MenuRepository;
use App\Repository\RestaurantRepository;
use App\Repository\SitePromotionRepository;
use App\Support\Geolocation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

/**
 * Class CuisineController
 * @package App\Http\Controllers\User
 */
class CuisineController extends Controller
{
    protected $cuisine;

    protected $geolocation;

    protected $restaurant;

    protected $menu;

    protected $site_promotion;

    /**
     * CuisineController constructor.
     * @param CuisineRepository $cuisine_repository
     * @param Geolocation $geolocation
     * @param RestaurantRepository $restaurant_repository
     * @param MenuRepository $menu_repository
     * @param SitePromotionRepository $site_promotion_repository
     */
    public function __construct(
        CuisineRepository $cuisine_repository,
        Geolocation $geolocation,
        RestaurantRepository $restaurant_repository,
        MenuRepository $menu_repository,
        SitePromotionRepository $site_promotion_repository
    )
    {
        $this->cuisine = $cuisine_repository;
        $this->geolocation = $geolocation;
        $this->restaurant = $restaurant_repository;
        $this->menu = $menu_repository;
        $this->site_promotion = $site_promotion_repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cuisines = $this->cuisine->all();

        foreach ($cuisines as $cuisine) {
            if ($cuisine->logo) {
                $cuisine->logo = getStorageUrl() . $cuisine->logo;
            } else {
                $cuisine->logo = asset('img/default.jpg');
            }
        }

        return view('user.cuisine.index', ['cuisines' => $cuisines]);
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
     * @param Cuisine $cuisine
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Cuisine $cuisine, Request $request)
    {
        $restaurants = $cuisine->restaurants()->get();

        if (Auth::check()) {
            $city = Auth::user()->city;
        } else {
            $city = false;
        }

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


        foreach ($restaurants as $key => $restaurant) {

            $restaurant_address = $restaurant->name . ', ' . $restaurant->city . ', ' . $restaurant->province . ', ' . $restaurant->county . ' ' . $restaurant->postcode;

            $restaurant->distance = $this->geolocation->getDistance($restaurant_address, $user_address);

            $reviews = $restaurant->reviews()->get();

            $restaurant->sort = $key;


            if ($restaurant->logo) {
                $restaurant->logo = getStorageUrl() . $restaurant->logo;
            } else {
                $restaurant->logo = asset('img/default.jpg');
            }

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


//            foreach ($cuisines as $cuisine) {
//                foreach ($restaurant->cuisines as $restaurant_cuisine) {
//                    if ($cuisine->id == $restaurant_cuisine->id) {
//                        $cuisine->count++;
//                    }
//                }
//                $cuisine->selected = true;
//            }

            $restaurant->opening_hours = $restaurant->openingHours()->orderBy('day', 'asc')->orderBy('opening_time', 'desc')->get();

            $restaurant->cuisines = $restaurant->cuisines()->get();

            if (Auth::check()) {
                if (Auth::user()->addresses()->count()) {
                    $user_address = Auth::user()->addresses()->where('default', '=', true)->first();
                    if ($user_address) {
                        $default_address = $user_address->address . ', ' . $user_address->street . ', ' . $user_address->city . ', ' . $user_address->county . ' ' . $user_address->postcode;
                        $restaurant_address = $restaurant->name . ', ' . $restaurant->city . ', ' . $restaurant->province . ', ' . $restaurant->county . ' ' . $restaurant->postcode;
                        $restaurant->distance = $this->geolocation->getDistance($restaurant_address, $default_address);
                    }
                }
            }

            $user_postcode = $this->geolocation->getPostCode($user_address);

            if (Auth::check()) {
                if (Auth::user()->addresses()->where('default', '=', true)->first()) {
                    $user_postcode = Auth::user()->addresses()->where('default', '=', true)->first()->postcode;
                }
            }

            $restaurant->free_delivery = '';
            $restaurant->delivery_time = '';
            $restaurant->minimum_total = '';

            foreach ($restaurant->deliveryLocations as $delivery_location) {
                if ($delivery_location->postcode == $user_postcode) {
                    $restaurant->delivery_time = $delivery_location->delivery_time . ' mins';
                    $restaurant->free_delivery = $delivery_location->free_delivery;
                    $restaurant->minimum_total = 'above ' . $delivery_location->minimum_total;
                }
            }

            $selected_opening_hours = [];

            $restaurant->pre_order_time = '';

            foreach ($restaurant->opening_hours as $opening_key => $opening_hour) {

                if (Carbon::now()->dayOfWeek == $opening_hour->day) {
                    $selected_opening_hours[] = $opening_hour;
                }

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

                $now = Carbon::now();

                if ($now->dayOfWeek == $opening_hour_day) {
                    if ($now->lt($opening)) {
                        $restaurant->pre_order_time = __('Opening at') . ' ' . $opening->format('h:i A');
                    }

                    if ($now->gt($closing)) {
                        if (count($restaurant->opening_hours) == $opening_key + 1) {
                            $restaurant->pre_order_time = __('Opening in ') . $opening_hour->day . ' ' . $restaurant->opening_hours[0]->opening;
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
                                $restaurant->pre_order_time = __('Pre order opening at tomorrow') . ' ' . $opening_hour->opening;
                            } else {
                                $restaurant->pre_order_time = __('Pre order opening at next') . ' ' . $next_day . ' ' . $opening_hour->opening;
                            }
                        }
                    }
                    if ($now->lt($closing) && $now->gt($opening)) {
                        $restaurant->pre_order_time = __('Open');
                    }

                    if ($now->lt($closing) && $now->gt($closing->subHour())) {
                        $restaurant->pre_order_time = __('Closing at') . ' ' . $closing->addHour()->format('h:i A');
                    }
                }

            }

            $restaurant->selected_opening_hours = $selected_opening_hours;

            $restaurant->rating = 5;
            $total = 0;

            if (count($restaurant->reviews)) {
                foreach ($restaurant->reviews as $review) {
                    $total += $review->rating;
                }
                $restaurant->rating = number_format($total / count($restaurant->reviews), 2, '.', '');
            }
        }

        $offers = [];

        $menus = $this->menu->all();

        foreach ($menus as $menu) {
            $menu_items = $menu
                ->menuItems()
                ->whereNull('deleted')
                ->whereNotNull('promo_code')
                ->where('promo_date', '>=', Carbon::now()->toDateString())
                ->orderBy('promo_date', 'desc')
                ->get();

            foreach ($menu_items as $menu_item) {
                if ($menu_item->menu->restaurant) {
                    $menu_item->url = route('user.restaurant.menu');
                    $menu_item->restaurant_name = $menu_item->menu->restaurant->name;
                    $menu_item->promocode = $menu_item->promo_code;
                    if ($menu_item->promo_usage > $menu_item->deliveries()->count() + $menu_item->takeaways()->count()) {
                        $offers[] = $menu_item;
                    }
                }
            }
        }

        $promotion_restaurants = $this->restaurant->promotionRestaurants(Carbon::now()->toDateString());

        foreach ($promotion_restaurants as $promotion_restaurant) {
            $promotion_restaurant->url = route('user.restaurant.menu');
            $promotion_restaurant->promo_type = $promotion_restaurant->discount_type;
            $promotion_restaurant->promo_value = $promotion_restaurant->discount_value;
            $promotion_restaurant->promo_date = $promotion_restaurant->expiry_date;
            $offers[] = $promotion_restaurant;
        }

        $promotions_restaurants = $this->restaurant->all();

        foreach ($promotions_restaurants as $promotions_restaurant) {
            $promotions = $promotions_restaurant->promotions()
                ->where('expiry_date', '>=', Carbon::now()->toDateString())
                ->where('start_date', '<=', Carbon::now()->toDateString())
                ->get();
            foreach ($promotions as $promotion) {
                if ($promotion->restaurant) {
                    $promotion->logo = $promotion->restaurant->logo;
                    $promotion->url = route('user.restaurant.menu');
                    $promotion->restaurant_name = $promotion->restaurant->name;
                    $promotion->promo_type = $promotion->type;
                    $promotion->promo_value = $promotion->value;
                    $promotion->promo_date = $promotion->expiry_date;
                    if ($promotion->limit > $promotion->deliveries()->count() + $promotion->takeaways()->count()) {
                        $offers[] = $promotion;
                    }
                }
            }
        }

        $site_promotions = $this->site_promotion->current(Carbon::now()->toDateString());

        foreach ($site_promotions as $site_promotion) {
            $site_promotion->logo = '';
            $site_promotion->url = route('user.home');
            $site_promotion->restaurant_name = '';
            $site_promotion->promo_type = $site_promotion->type;
            $site_promotion->promo_value = $site_promotion->value;
            $site_promotion->promo_date = $site_promotion->expiry_date;
            if ($site_promotion->limit > $site_promotion->deliveries()->count() + $site_promotion->takeaways()->count()) {
                $offers[] = $site_promotion;
            }
        }

        return view('user.cuisine.show', [
            'restaurants' => $restaurants,
            'offers' => $offers
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Cuisine $cuisine
     * @return \Illuminate\Http\Response
     */
    public function edit(Cuisine $cuisine)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Cuisine $cuisine
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cuisine $cuisine)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Cuisine $cuisine
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cuisine $cuisine)
    {
        //
    }
}
