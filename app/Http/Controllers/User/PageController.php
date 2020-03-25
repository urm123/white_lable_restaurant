<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Repository\CuisineRepository;
use App\Repository\MenuRepository;
use App\Repository\ReservationRepository;
use App\Repository\RestaurantRepository;
use App\Repository\SitePromotionRepository;
use App\Rules\Telephone;
use App\Support\Geolocation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

/**
 * Class PageController
 * @package App\Http\Controllers\User
 */
class PageController extends Controller
{

    protected $restaurant;

    protected $cuisine;

    protected $geolocation;

    protected $menu;

    protected $site_promotions;

    protected $reservation;

    /**
     * PageController constructor.
     * @param RestaurantRepository $restaurant_repository
     * @param CuisineRepository $cuisine_repository
     * @param Geolocation $geolocation
     * @param MenuRepository $menu_repository
     * @param SitePromotionRepository $site_promotion
     * @param ReservationRepository $reservation_repository
     */
    public function __construct(
        RestaurantRepository $restaurant_repository,
        CuisineRepository $cuisine_repository,
        Geolocation $geolocation,
        MenuRepository $menu_repository,
        SitePromotionRepository $site_promotion,
        ReservationRepository $reservation_repository
    )
    {
        $this->restaurant = $restaurant_repository;
        $this->cuisine = $cuisine_repository;
        $this->geolocation = $geolocation;
        $this->menu = $menu_repository;
        $this->site_promotions = $site_promotion;
        $this->reservation = $reservation_repository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $popular_items = $this->restaurant->getPopularItems(1);

        $restaurant = $this->restaurant->getRestaurant(1);

        foreach ($popular_items as $popular_item) {
            $popular_item->logo = getStorageUrl() . $popular_item->logo;
            $popular_item->favoured = false;

            if ($popular_item->users()->where('user_id', '=', Auth::id())->count()) {
                $popular_item->favoured = true;
            }
        }

        $restaurant->opening_hours = $restaurant->openingHours()->get();

        foreach ($restaurant->opening_hours as $opening_key => $opening_hour) {
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
        }

        return view('user.page.index', [
            'popular_items' => $popular_items,
            'restaurant' => $restaurant
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function search(Request $request)
    {
        $term = $request->term;
        $type = $request->type;

        if (!$term) {
            $term = "";
        }

        if (!$type) {
            $type = 'delivery';
        }

        $restaurants = $this->restaurant->search($term, $type);

        $cuisines = $this->cuisine->all();

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

        $default_address = $user_address;


        foreach ($restaurants as $restaurant) {
            $restaurant->cuisines = $restaurant->cuisines()->get();
            $restaurant->reviews = $restaurant->reviews()->get();
            $restaurant->opening_hours = $restaurant->openingHours()->orderBy('day', 'asc')->orderBy('opening_time', 'desc')->get();

            foreach ($cuisines as $cuisine) {
                foreach ($restaurant->cuisines as $restaurant_cuisine) {
                    if ($cuisine->id == $restaurant_cuisine->id) {
                        $cuisine->count++;
                    }
                }
                $cuisine->selected = true;
            }

            $restaurant_address = $restaurant->name . ', ' . $restaurant->city . ', ' . $restaurant->province . ', ' . $restaurant->county . ' ' . $restaurant->postcode;


            if (Auth::check()) {
                if (Auth::user()->addresses()->count()) {
                    $user_address = Auth::user()->addresses()->where('default', '=', true)->first();
                    if ($user_address) {
                        $default_address = $user_address->address . ', ' . $user_address->street . ', ' . $user_address->city . ', ' . $user_address->county . ' ' . $user_address->postcode;
                        $restaurant->distance = $this->geolocation->getDistance($restaurant_address, $default_address);
//                        $user_postcode = $user_address->postcode;
                    }
                }
            }

            if ($user_address) {
                $restaurant->distance = $this->geolocation->getDistance($restaurant_address, $default_address);
            }


//            foreach ($restaurant->deliveryLocations as $delivery_location) {
//                if ($delivery_location->postcode == $user_postcode) {
//                    $restaurant->delivery_time = $delivery_location->delivery_time . ' mins';
//                    $restaurant->free_delivery = $delivery_location->free_delivery;
//
//                    if ($delivery_location->minimum_total) {
//                        $restaurant->minimum_total = 'above ' . $delivery_location->minimum_total;
//                    }
//                }
//            }

            if ($restaurant->logo) {
                $restaurant->logo = getStorageUrl() . $restaurant->logo;
            } else {
                $restaurant->logo = asset('img/default.jpg');
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

        $request->session()->put('type', $type);

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

        return view('user.page.search', [
            'results' => $restaurants,
            'cuisines' => $cuisines,
            'term' => $term,
            'type' => $type,
            'offers' => $offers
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function about()
    {
        $restaurant = $this->restaurant->getRestaurant(1);

        return view('user.page.about', compact('restaurant'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function blog()
    {
        return view('user.page.blog');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function careers()
    {
        return view('user.page.careers');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function press()
    {
        return view('user.page.press');
    }

    public function faq()
    {
        return view('user.page.faq');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function contact()
    {
        $restaurant = $this->restaurant->getRestaurant(1);

        return view('user.page.contact', compact('restaurant'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function postContact(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'phone' => new Telephone,
            'message' => 'required',
        ]);
//        $request->session()->flash('success', 'Mail sent successfully!');
        Mail::raw('Contact us Email: \r\nFirst name: ' . $request->first_name . '\r\nLast name: ' . $request->last_name . '\r\nEmail: ' . $request->email . '\r\nPhone: ' . $request->phone . '\r\nMessage: ' . $request->message, function ($message) {
            $message->to(setting('contact_email_id'))->subject('Contact Us email');
        });
        return redirect(route('contact.thank.you'));

    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function why()
    {
        return view('user.page.why');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function cancellations()
    {
        return view('user.page.cancellations');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function terms()
    {
        return view('user.page.terms');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function privacy()
    {
        return view('user.page.privacy');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function landing()
    {
        if (Auth::check() && Auth::user()->role == 'admin') {
            return redirect(route('admin.delivery.index'));
        } else {
            $cuisines = $this->cuisine->all();
            return view('admin.page.landing', ['cuisines' => $cuisines]);
        }
    }

    /**
     * @param $locale
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function locale($locale, Request $request)
    {
        $request->session()->put('language', $locale);
        return redirect(url()->previous());
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function contactThankYou()
    {
        return view('user.page.contact-thank-you');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function reservationThankYou()
    {

        $reservation_id = session('reservation_id');

        $reservation = $this->reservation->get($reservation_id);

        $reservation->restaurant = $reservation->restaurant()->withTrashed()->first();

        $restaurant_address = $reservation->restaurant->city . '+' . $reservation->restaurant->province . '+' . $reservation->restaurant->county . '+' . $reservation->restaurant->postcode;

        $reservation->restaurant->query_address = str_replace(' ', '+', $restaurant_address);

        $reservation->date = Carbon::parse($reservation->time)->toFormattedDateString();
        $reservation->time = Carbon::parse($reservation->time)->format('g:i A');

        return view('user.page.reservation-thank-you', ['reservation' => $reservation]);
    }


}
