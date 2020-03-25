<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Menu;
use App\Repository\CuisineRepository;
use App\Repository\MenuItemRepository;
use App\Repository\MenuRepository;
use App\Repository\PaymentMethodRepository;
use App\Repository\RestaurantRepository;
use App\Repository\SitePromotionRepository;
use App\Restaurant;
use App\Support\Geolocation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class RestaurantController
 * @package App\Http\Controllers\User
 */
class RestaurantController extends Controller
{

    protected $cuisine;

    protected $restaurant;

    protected $geolocation;

    protected $payment_method;

    protected $menu;

    protected $site_promotions;

    protected $menu_item;

    /**
     * RestaurantController constructor.
     * @param CuisineRepository $cuisine_repository
     * @param RestaurantRepository $restaurant_repository
     * @param Geolocation $geolocation
     * @param PaymentMethodRepository $payment_method_repository
     * @param SitePromotionRepository $site_promotion_repository
     * @param MenuRepository $menu_repository
     */
    public function __construct(
        CuisineRepository $cuisine_repository,
        RestaurantRepository $restaurant_repository,
        Geolocation $geolocation,
        PaymentMethodRepository $payment_method_repository,
        SitePromotionRepository $site_promotion_repository,
        MenuRepository $menu_repository,
        MenuItemRepository $menu_item_repository
    )
    {
        $this->cuisine = $cuisine_repository;
        $this->restaurant = $restaurant_repository;
        $this->geolocation = $geolocation;
        $this->payment_method = $payment_method_repository;
        $this->site_promotions = $site_promotion_repository;
        $this->menu = $menu_repository;
        $this->menu_item = $menu_item_repository;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $cuisines = $this->cuisine->all();

        foreach ($cuisines as $cuisine) {
            $cuisine->count = $cuisine->restaurants()->count();
            $cuisine->selected = true;
        }

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


        $restaurants = [];

        switch ($request->type) {
            case 'nearby':
                $all_restaurants = $this->restaurant->all();

                foreach ($all_restaurants as $restaurant) {
                    $restaurant_address = $restaurant->name . ', ' . $restaurant->city . ', ' . $restaurant->province . ', ' . $restaurant->county . ' ' . $restaurant->postcode;

                    $restaurant->distance = $this->geolocation->getDistance($restaurant_address, $user_address);
                    if ($restaurant->distance < 20) {
                        $restaurants[] = $restaurant;
                    }
                }
                break;
            case 'nearby-popular':
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
                $restaurant->logo = asset('storage/' . $restaurant->logo);
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


            foreach ($cuisines as $cuisine) {
                foreach ($restaurant->cuisines as $restaurant_cuisine) {
                    if ($cuisine->id == $restaurant_cuisine->id) {
                        $cuisine->count++;
                    }
                }
                $cuisine->selected = true;
            }

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

//            $restaurant->logo = getStorageUrl() . $restaurant->logo;

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

        $site_promotions = $this->site_promotions->current(Carbon::now()->toDateString());

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

        return view('user.restaurant.index', [
            'cuisines' => $cuisines,
            'restaurants' => $restaurants,
            'offers' => $offers,
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
     * @param Restaurant $restaurant
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Restaurant $restaurant, Request $request)
    {

        $user_postcode = '';

        $restaurant->opening_hours = $restaurant->openingHours()->orderBy('day', 'asc')->orderBy('opening_time', 'desc')->get();

        $menus = $restaurant->menus()->get();


        if ($restaurant->logo) {
            $restaurant->logo = asset('storage/'. $restaurant->logo) ;
        } else {
            $restaurant->logo = asset('img/default.jpg');
        }

        foreach ($restaurant->media as $media) {
            if ($media->path) {
                $media->path = asset('storage/'.$media->path);
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
                    $menu_item->logo = asset('storage/'. $menu_item->logo) ;
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
                    $restaurant->distance = $this->geolocation->getDistance($restaurant_address, $default_address);
                    $user_postcode = $user_address->postcode;
                }
            }
        }

        if (!$user_postcode) {
            $user_postcode = $this->geolocation->getPostCode($user_address);
        }

        $restaurant->free_delivery = '';
        $restaurant->delivery_time = '';
        $restaurant->minimum_total = '';

        $restaurant->delivery_minutes = 30;

        foreach ($restaurant->deliveryLocations as $delivery_location) {
            if ($delivery_location->postcode == $user_postcode) {
                $restaurant->delivery_minutes = $delivery_location->delivery_time;
                $restaurant->delivery_time = $delivery_location->delivery_time . ' mins';
                $restaurant->free_delivery = $delivery_location->free_delivery;
                $restaurant->delivery_cost = $delivery_location->delivery_cost + $delivery_location->delivery_cost * getVat()['delivery'];
                $restaurant->minimum_total = 'above ' . number_format($delivery_location->minimum_total, 2);
            }
        }

        if (!$restaurant->delivery_cost) {
            $restaurant->delivery_cost = 0;
        }

        $restaurant->clock_minutes = $restaurant->delivery_minutes + 1;

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

        $areas = [];

        foreach ($restaurant->deliveryLocations as $delivery_location) {
            $areas[] = $delivery_location;
        }

        $takeaway_locations = $restaurant->takeawayLocations()->get();

        foreach ($takeaway_locations as $takeaway_location) {

            $takeaway_location->selected = true;

            foreach ($areas as $area) {
                if ($area->postcode == $takeaway_location->postcode) {
                    $takeaway_location->selected = false;
                }
            }
        }

        foreach ($takeaway_locations as $takeaway_location) {
            if ($takeaway_location->selected) {
                $areas[] = $takeaway_location;
            }
        }

        $restaurant->areas = $areas;


        $payment_methods = $this->payment_method->all();

        $rating_access = false;

        if (Auth::check()) {
            $user = Auth::user();
            $two_hours = Carbon::now()->subHours(2)->toDateTimeString();
            $fifteen_hours = Carbon::now()->subDays(15)->toDateTimeString();
            $deliveries = $user->deliveries()->where('created_at', '<=', $two_hours)->where('created_at', '>=', $fifteen_hours)->whereRestaurantId($restaurant->id)->count();
            $takeaways = $user->takeaways()->where('created_at', '<=', $two_hours)->where('created_at', '>=', $fifteen_hours)->whereRestaurantId($restaurant->id)->count();
            if ($deliveries + $takeaways > 0) {
                $rating_access = true;
            }
        }

        $location = $this->geolocation->get($restaurant->query_address);

        $restaurant->latitude = $location['latitude'];
        $restaurant->longitude = $location['longitude'];

        if ($request->type) {
            $type = $request->type;
        }

        return view('user.restaurant.show', [
            'restaurant' => $restaurant,
            'cart' => $cart,
            'requests' => $requests,
            'type' => $type,
            'cart_date' => $cart_date,
            'cart_time' => $cart_time,
            'restaurant_id' => $restaurant_id,
            'payment_methods' => $payment_methods,
            'rating_access' => $rating_access,
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function menu(Request $request)
    {

        $restaurant_id = 1;

        $restaurant = $this->restaurant->getRestaurant($restaurant_id);

        $user_postcode = '';

        $restaurant->opening_hours = $restaurant->openingHours()->orderBy('day', 'asc')->orderBy('opening_time', 'desc')->get();

        $menus = $restaurant->menus()->get();


        if ($restaurant->logo) {
            $restaurant->logo = asset('storage/'. $restaurant->logo);
        } else {
            $restaurant->logo = asset('img/default.jpg');
        }

        foreach ($restaurant->media as $media) {
            if ($media->path) {
                $media->path = asset('storage/'. $media->path);
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
                    $menu_item->logo = asset('storage/'. $menu_item->logo);
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


        if (Auth::check()) {
            $restaurant->user = $restaurant->users()->where('user_id', '=', Auth::id())->first();
        } else {
            $restaurant->user = false;
        }

        $restaurant_address = $restaurant->name . '+' . $restaurant->city . '+' . $restaurant->province . '+' . $restaurant->county . '+' . $restaurant->postcode;

        $restaurant->query_address = str_replace(' ', '+', $restaurant_address);

        $PublicIP = $request->ip();
        $curlSession = curl_init();
        curl_setopt($curlSession, CURLOPT_URL, "https://ipinfo.io/$PublicIP/geo?token=".config('services.ip_info_token'));
        curl_setopt($curlSession, CURLOPT_BINARYTRANSFER, true);
        curl_setopt($curlSession, CURLOPT_RETURNTRANSFER, true);

        $json = json_decode(curl_exec($curlSession));
        curl_close($curlSession);

        if (isset($json->city) && isset($json->region) && isset($json->country)) {
            $user_address = $json->city . ', ' . $json->region . ', ' . $json->country;
        } else {
            $user_address = 'null';
        }

        if (isset($json->posta)) {
            $user_postcode = $json->postal;
        }

        if (Auth::check()) {
            if (Auth::user()->addresses()->count()) {
                $user_address = Auth::user()->addresses()->where('default', '=', true)->first();
                if ($user_address) {
                    $default_address = $user_address->address . ', ' . $user_address->street . ', ' . $user_address->city . ', ' . $user_address->county . ' ' . $user_address->postcode;
                    $restaurant->distance = $this->geolocation->getDistance($restaurant_address, $default_address);
                    $user_postcode = $user_address->postcode;
                }
            }
        }

        if (!$user_postcode) {
            $user_postcode = $this->geolocation->getPostCode($user_address);
        }

        $user_delivery_location = $restaurant->deliveryLocations()->wherePostcode($user_postcode)->first();

        if ($user_delivery_location) {
            $restaurant->delivery_cost = $user_delivery_location->delivery_cost + $user_delivery_location->delivery_cost * getVat()['delivery'];
        }

        if (!$restaurant->delivery_cost) {
            $restaurant->delivery_cost = 0;
        }

        $restaurant->clock_minutes = $restaurant->delivery_minutes + 1;

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


        $cart_date = Carbon::now()->toDateString();

        $cart_time = Carbon::now()->addMinutes($restaurant->clock_minutes)->addMinute()->format('h:i A');

        if ($request->session()->get('restaurant_id')) {
            $restaurant_id = $request->session()->get('restaurant_id');
        } else {
            $restaurant_id = 0;
        }
        $payment_methods = $this->payment_method->all();

        if (Auth::check()) {
            $user = Auth::user();
            $two_hours = Carbon::now()->subHours(2)->toDateTimeString();
            $fifteen_hours = Carbon::now()->subDays(15)->toDateTimeString();
            $deliveries = $user->deliveries()->where('created_at', '<=', $two_hours)->where('created_at', '>=', $fifteen_hours)->whereRestaurantId($restaurant->id)->count();
            $takeaways = $user->takeaways()->where('created_at', '<=', $two_hours)->where('created_at', '>=', $fifteen_hours)->whereRestaurantId($restaurant->id)->count();
            if ($deliveries + $takeaways > 0) {
                $rating_access = true;
            }
        }

        $location = $this->geolocation->get($restaurant->query_address);

        $restaurant->latitude = $location['latitude'];
        $restaurant->longitude = $location['longitude'];

        if ($request->type) {
            $type = $request->type;
        }

        return view('user.restaurant.show', [
            'restaurant' => $restaurant,
            'cart' => $cart,
            'requests' => $requests,
            'type' => $type,
            'cart_date' => $cart_date,
            'cart_time' => $cart_time,
            'restaurant_id' => $restaurant_id,
            'payment_methods' => $payment_methods,
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function reviews()
    {
        $restaurant_id = 1;

        $restaurant = $this->restaurant->getRestaurant($restaurant_id);


        $reviews = $restaurant->reviews()->orderBy('created_at', 'desc')->get();

        $total = 0;
        $count = 0;

        $rating_values = [
            '5 ' => 0,
            '4 ' => 0,
            '3 ' => 0,
            '2 ' => 0,
            '1 ' => 0,
        ];

        foreach ($reviews as $review) {
            $total += $review->rating;
            $count++;
            $rating_values[$review->rating . ' ']++;
            $review->updated_date = Carbon::parse($review->updated_at)->diffForHumans();
            $review->user = $review->user;
        }

        $restaurant->reviews = $reviews;

        $percentages = [
            '5 ' => 0,
            '4 ' => 0,
            '3 ' => 0,
            '2 ' => 0,
            '1 ' => 0,
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

        $rating_access = false;

        if (Auth::check()) {
            $user = Auth::user();
            $two_hours = Carbon::now()->subHours(2)->toDateTimeString();
            $fifteen_hours = Carbon::now()->subDays(15)->toDateTimeString();
            $deliveries = $user->deliveries()->where('created_at', '<=', $two_hours)->where('created_at', '>=', $fifteen_hours)->whereRestaurantId($restaurant->id)->count();
            $takeaways = $user->takeaways()->where('created_at', '<=', $two_hours)->where('created_at', '>=', $fifteen_hours)->whereRestaurantId($restaurant->id)->count();
            if ($deliveries + $takeaways > 0) {
                $rating_access = true;
            }
        }

        $rating_access = true;


        return view('user.restaurant.reviews', [
            'restaurant' => $restaurant,
            'restaurant_id' => $restaurant_id,
            'rating_access' => $rating_access,
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function about(Request $request)
    {
        $restaurant_id = $request->id;

        $restaurant = $this->restaurant->getRestaurant($restaurant_id);

        $user_postcode = '';

        $restaurant->opening_hours = $restaurant->openingHours()->orderBy('day', 'asc')->orderBy('opening_time', 'desc')->get();


        if ($restaurant->logo) {
            $restaurant->logo = asset('storage/'. $restaurant->logo);
        } else {
            $restaurant->logo = asset('img/default.jpg');
        }

        foreach ($restaurant->media as $media) {
            if ($media->path) {
                $media->path = asset('storage/'. $media->path);
            } else {
                $media->path = asset('img/default.jpg');
            }
        }


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
                    $restaurant->distance = $this->geolocation->getDistance($restaurant_address, $default_address);
                    $user_postcode = $user_address->postcode;
                }
            }
        }

        if (!$user_postcode) {
            $user_postcode = $this->geolocation->getPostCode($user_address);
        }

        $restaurant->free_delivery = '';
        $restaurant->delivery_time = '';
        $restaurant->minimum_total = '';

        $restaurant->delivery_minutes = 30;

        foreach ($restaurant->deliveryLocations as $delivery_location) {
            if ($delivery_location->postcode == $user_postcode) {
                $restaurant->delivery_minutes = $delivery_location->delivery_time;
                $restaurant->delivery_time = $delivery_location->delivery_time . ' mins';
                $restaurant->free_delivery = $delivery_location->free_delivery;
                $restaurant->delivery_cost = $delivery_location->delivery_cost + $delivery_location->delivery_cost * getVat()['delivery'];
                $restaurant->minimum_total = 'above ' . number_format($delivery_location->minimum_total, 2);
            }
        }

        if (!$restaurant->delivery_cost) {
            $restaurant->delivery_cost = 0;
        }

        $restaurant->clock_minutes = $restaurant->delivery_minutes + 1;

        if ($request->session()->get('restaurant_id')) {
            $restaurant_id = $request->session()->get('restaurant_id');
        } else {
            $restaurant_id = 0;
        }

        $areas = [];

        foreach ($restaurant->deliveryLocations as $delivery_location) {
            $areas[] = $delivery_location;
        }

        $takeaway_locations = $restaurant->takeawayLocations()->get();

        foreach ($takeaway_locations as $takeaway_location) {

            $takeaway_location->selected = true;

            foreach ($areas as $area) {
                if ($area->postcode == $takeaway_location->postcode) {
                    $takeaway_location->selected = false;
                }
            }
        }

        foreach ($takeaway_locations as $takeaway_location) {
            if ($takeaway_location->selected) {
                $areas[] = $takeaway_location;
            }
        }

        $restaurant->areas = $areas;

        $payment_methods = $this->payment_method->all();

        $location = $this->geolocation->get($restaurant->query_address);

        $restaurant->latitude = $location['latitude'];
        $restaurant->longitude = $location['longitude'];

        return view('user.restaurant.about', [
            'restaurant' => $restaurant,
            'restaurant_id' => $restaurant_id,
            'payment_methods' => $payment_methods,
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
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function validateOrder(Request $request)
    {
        $postcode = $request->postcode;

        $restaurant_id = $request->restaurant_id;

        $restaurant = $this->restaurant->getRestaurant($restaurant_id);

        $cart_date = Carbon::parse($request->cart_date . ' ' . $request->cart_time);

        $delivery_cost = 0;

        $delivery_flag = false;

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

        if (!$postcode) {

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
                }
            }

            $user_postcode = $this->geolocation->getPostCode($user_address);

            if (Auth::check()) {
                if (Auth::user()->addresses()->where('default', '=', true)->first()) {
                    $user_postcode = Auth::user()->addresses()->where('default', '=', true)->first()->postcode;
                }
            }

            $postcode = $user_postcode;
        }

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

        if ($delivery_flag) {
            return response()->json([
                'message' => 'Sorry we do not delivery to this location.'
            ], 402);
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
    public function validateTakeawayOrder(Request $request)
    {
        $restaurant_id = $request->restaurant_id;

        $restaurant = $this->restaurant->getRestaurant($restaurant_id);

        $cart_date = Carbon::parse($request->cart_date . ' ' . $request->cart_time);

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

        return response()->json([
            'message' => 'success',
        ]);
    }
}
