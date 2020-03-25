<?php

namespace App\Http\Controllers\Api\User;

use App\Repository\CuisineRepository;
use App\Repository\DeliveryRepository;
use App\Repository\ReservationRepository;
use App\Repository\RestaurantRepository;
use App\Repository\TakeawayRepository;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

/**
 * Class PageController
 * @package App\Http\Controllers\User
 */
class SearchController extends Controller
{

    protected $restaurant;

    protected $cuisine;

    protected $delivery;

    protected $takeaway;

    protected $reservation;

    /**
     * SearchController constructor.
     * @param RestaurantRepository $restaurant_repository
     * @param CuisineRepository $cuisine_repository
     * @param DeliveryRepository $delivery_repository
     * @param TakeawayRepository $takeaway_repository
     * @param ReservationRepository $reservation_repository
     */
    public function __construct(
        RestaurantRepository $restaurant_repository,
        CuisineRepository $cuisine_repository,
        DeliveryRepository $delivery_repository,
        TakeawayRepository $takeaway_repository,
        ReservationRepository $reservation_repository
    )
    {
        $this->restaurant = $restaurant_repository;
        $this->cuisine = $cuisine_repository;
        $this->delivery = $delivery_repository;
        $this->takeaway = $takeaway_repository;
        $this->reservation = $reservation_repository;
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function search(Request $request)
    {
        $postcode = $request->postcode;
        $type = $request->type;

        if (!$postcode) {
            $postcode = "";
        }

        if (!$type) {
            $type = 'delivery';
        }

        $results = $this->restaurant->searchWithPostCode($postcode, $type);

        $cuisines = $this->cuisine->all();

        foreach ($cuisines as $cuisine) {
            $cuisine->logo = getStorageUrl() . $cuisine->logo;
        }

        $popular_restaurants = $this->restaurant->getPopularRestaurants();

        foreach ($popular_restaurants as $key => $popular_restaurant) {
            $reviews = $popular_restaurant->reviews()->get();

            $popular_restaurant->logo = getStorageUrl() . $popular_restaurant->logo;

            $popular_restaurant->sort = $key;

            $total = 0;
            $count = 0;

            foreach ($reviews as $review) {
                $total += $review->rating;
                $count++;
            }

            if ($total && $count) {
                $popular_restaurant->rating = number_format($total / $count, 0, '.', '');
            } else {
                $popular_restaurant->rating = 5;
            }

            $popular_restaurant->price_range = $popular_restaurant->price_range + 1;

            if (Auth::check()) {
                if (Auth::user()->addresses()->count()) {
                    $user_address = Auth::user()->addresses()->where('default', '=', true)->first();
                    if ($user_address) {
                        $default_address = $user_address->street . ', ' . $user_address->city . ', ' . $user_address->county . ' ' . $user_address->postcode;
                        $restaurant_address = $popular_restaurant->name . ', ' . $popular_restaurant->city . ', ' . $popular_restaurant->province . ', ' . $popular_restaurant->county . ' ' . $popular_restaurant->postcode;
                        $popular_restaurant->distance = $this->geolocation->getDistance($restaurant_address, $default_address);
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

            $popular_restaurant->delivery_locations = $popular_restaurant->deliveryLocations()->get();

            $popular_restaurant->cuisines = $popular_restaurant->cuisines()->get();

            $popular_restaurant->reviews = [];
        }


        foreach ($cuisines as $cuisine) {
            $cuisine->count = $cuisine->restaurants()->count();
            $cuisine->selected = true;
        }

        foreach ($results as $key => $result) {

            $reviews = $result->reviews()->get();

            $result->logo = getStorageUrl() . $result->logo;

            $result->cuisines = $result->cuisines()->get();

            $result->sort = $key;

            $result->price_range = $result->price_range + 1;


            $total = 0;
            $count = 0;

            foreach ($reviews as $review) {
                $total += $review->rating;
                $count++;
            }

            if ($total && $count) {
                $result->rating = number_format($total / $count, 0, '.', '');
            } else {
                $result->rating = 5;
            }

            if (Auth::check()) {
                if (Auth::user()->addresses()->count()) {
                    $user_address = Auth::user()->addresses()->where('default', '=', true)->first();
                    if ($user_address) {
                        $default_address = $user_address->street . ', ' . $user_address->city . ', ' . $user_address->county . ' ' . $user_address->postcode;
                        $restaurant_address = $result->name . ', ' . $result->city . ', ' . $result->province . ', ' . $result->county . ' ' . $result->postcode;
                        $result->distance = $this->geolocation->getDistance($restaurant_address, $default_address);
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

            $result->delivery_locations = $result->deliveryLocations()->get();

            $result->reviews = [];
        }

        $orders = [];


        if ($request->user_id) {
            $user_id = $request->user_id;
            $deliveries = $this->delivery->getActive($user_id);
            $takeaways = $this->takeaway->getActive($user_id);
            $reservations = $this->reservation->getActive($user_id);


            foreach ($takeaways as $takeaway) {
                $takeaway->takeaway_items = $takeaway->takeawayItems;


                foreach ($takeaway->takeaway_items as $takeaway_item) {
                    if ($takeaway_item->menuItem && $takeaway_item->menuItem->menu) {
                        $takeaway->restaurant = $takeaway_item->menuItem->menu->restaurant()->withTrashed()->first();
                    } else {
                        $takeaway->restaurant = '';
                    }
                    $takeaway_item->menu_item = $takeaway_item->menuItem()->first();
                }

                $takeaway->time = Carbon::parse($takeaway->time)->diffForHumans();

                switch ($takeaway->status) {
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

                $takeaway->progress = $progress;
            }


            foreach ($reservations as $reservation) {
                $reservation->restaurant = $reservation->restaurant()->withTrashed()->first();

                $restaurant_address = $reservation->restaurant->city . '+' . $reservation->restaurant->province . '+' . $reservation->restaurant->county . '+' . $reservation->restaurant->postcode;

                $reservation->restaurant->query_address = str_replace(' ', '+', $restaurant_address);

                $reservation->date = Carbon::parse($reservation->time)->toFormattedDateString();
                $reservation->time = Carbon::parse($reservation->time)->format('g:i A');
            }


            foreach ($deliveries as $delivery) {
                $delivery->delivery_items = $delivery->deliveryItems;

                $delivery->restaurant = $delivery->restaurant()->withTrashed()->first();


                foreach ($delivery->delivery_items as $delivery_item) {
                    $delivery_item->menu_item = $delivery_item->menuItem()->first();
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


            foreach ($deliveries as $delivery) {
                $delivery->total = 0;
                foreach ($delivery->delivery_items as $delivery_item) {
                    if ($delivery_item->menu_item) {
                        $delivery->total += $delivery_item->menu_item->price * $delivery_item->quantity;
                    }
                }
                $delivery->type = 'delivery';
                $orders[] = $delivery;
            }

            foreach ($takeaways as $takeaway) {
                $takeaway->total = 0;
                foreach ($takeaway->takeaway_items as $takeaway_item) {
                    if ($takeaway_item->menu_item) {
                        $takeaway->total += $takeaway_item->menu_item->price * $takeaway_item->quantity;
                    }
                }
                $takeaway->type = 'takeaway';
                $orders[] = $takeaway;
            }

            foreach ($reservations as $reservation) {
                $reservation->type = 'reservation';
                if (Carbon::parse($reservation->time)->lte(Carbon::now())) {
                    $reservation->reservation_status = 'expired';
                } else {
                    $reservation->reservation_status = 'pending';
                }
                $orders[] = $reservation;
            }


        }

        return response()->json([
            'message' => 'success',
            'data' => [
                'interests' => $results,
                'recommended' => $results,
                'popular' => $popular_restaurants,
                'cuisines' => $cuisines,
                'postcode' => $postcode,
                'type' => $type,
                'orders' => $orders
            ]
        ]);
    }
}
