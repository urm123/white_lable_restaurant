<?php

namespace App\Http\Controllers\MasterAdmin;

use App\Http\Controllers\Controller;
use App\Repository\CloneRepository;
use App\Repository\CuisineRepository;
use App\Repository\RestaurantRepository;
use App\RestaurantClone;
use Carbon\Carbon;
use Illuminate\Http\Request;

/**
 * Class RequestController
 * @package App\Http\Controllers\MasterAdmin
 */
class RequestController extends Controller
{
    protected $clone;

    protected $restaurant;

    protected $cuisine;

    /**
     * RequestController constructor.
     * @param CloneRepository $clone_repository
     * @param RestaurantRepository $restaurant_repository
     * @param CuisineRepository $cuisine_repository
     */
    public function __construct(CloneRepository $clone_repository, RestaurantRepository $restaurant_repository, CuisineRepository $cuisine_repository)
    {
        $this->clone = $clone_repository;
        $this->restaurant = $restaurant_repository;
        $this->cuisine = $cuisine_repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('master-admin.request.index');
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function getRequests(Request $request)
    {
        $requests = [];

        $from_date = $request->from_date;
        $to_date = $request->to_date;

        if (!$from_date) {
            $from_date = Carbon::now()->subMonth()->toDateString();
        }

        if (!$to_date) {
            $to_date = Carbon::now()->toDateString();
        }

        $to_date = Carbon::parse($to_date)->addDay()->toDateTimeString();
        $from_date = Carbon::parse($from_date)->toDateTimeString();

        $clones = $this->clone->getRestaurants($from_date, $to_date);

        $deliveries = $this->clone->getDeliveries($from_date, $to_date);

        $takeaways = $this->clone->getTakeaways($from_date, $to_date);

        $promotions = $this->clone->getPromotions($from_date, $to_date);

        $menus = $this->clone->getMenus($from_date, $to_date);

        $menu_items = $this->clone->getMenuItems($from_date, $to_date);

        foreach ($clones as $clone) {
            $restaurant = $clone->restaurant()->withTrashed()->first();
            $restaurant->clone_type = 'restaurant';

            if ($clone->update_type == 'discount') {
                $restaurant->clone_type = 'restaurant_discount';
            }

            $restaurant->date = Carbon::parse($clone->created_at)->toDayDateTimeString();
            $restaurant->username = $restaurant->user->first_name . ' ' . $restaurant->user->last_name;
            $requests[] = $restaurant;
        }

        foreach ($deliveries as $delivery) {
            $restaurant = $delivery->restaurant()->withTrashed()->first();
            $restaurant->clone_type = 'delivery';
            $restaurant->date = Carbon::parse($delivery->created_at)->toDayDateTimeString();
            $restaurant->username = $restaurant->user->first_name . ' ' . $restaurant->user->last_name;
            $requests[] = $restaurant;
        }

        foreach ($takeaways as $takeaway) {
            $restaurant = $takeaway->restaurant()->withTrashed()->first();
            $restaurant->clone_type = 'takeaway';
            $restaurant->date = Carbon::parse($takeaway->created_at)->toDayDateTimeString();
            $restaurant->username = $restaurant->user->first_name . ' ' . $restaurant->user->last_name;
            $requests[] = $restaurant;
        }

        foreach ($promotions as $promotion) {
            $restaurant = $promotion->restaurant()->withTrashed()->first();
            $restaurant->clone_type = 'promotion';
            $restaurant->date = Carbon::parse($promotion->created_at)->toDayDateTimeString();
            $restaurant->username = $restaurant->user->first_name . ' ' . $restaurant->user->last_name;
            $requests[] = $restaurant;
        }

        foreach ($menus as $menu) {
            $restaurant = $menu->restaurant()->withTrashed()->first();
            $restaurant->clone_type = 'menu';
            $restaurant->date = Carbon::parse($menu->created_at)->toDayDateTimeString();
            $restaurant->username = $restaurant->user->first_name . ' ' . $restaurant->user->last_name;
            $requests[] = $restaurant;
        }

        foreach ($menu_items as $menu_item) {
            $restaurant = $menu_item->menu()->first()->restaurant()->withTrashed()->first();
            $restaurant->clone_type = 'menu_item';
            $restaurant->date = Carbon::parse($menu_item->created_at)->toDayDateTimeString();
            $restaurant->username = $restaurant->user->first_name . ' ' . $restaurant->user->last_name;
            $requests[] = $restaurant;
        }


        return response()->json([
            'message' => 'success',
            'data' => [
                'requests' => $requests
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
     * @param \App\RestaurantClone $restaurantClone
     * @return \Illuminate\Http\Response
     */
    public function show(RestaurantClone $restaurantClone)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\RestaurantClone $restaurantClone
     * @return \Illuminate\Http\Response
     */
    public function edit(RestaurantClone $restaurantClone)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\RestaurantClone $restaurantClone
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RestaurantClone $restaurantClone)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\RestaurantClone $restaurantClone
     * @return \Illuminate\Http\Response
     */
    public function destroy(RestaurantClone $restaurantClone)
    {
        //
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function restaurant(Request $request)
    {
        $restaurant = $this->clone->getRestaurant($request->restaurant_id);

        $restaurant->openingHours = $restaurant->restaurant()->withTrashed()->first()->openingHourClone;

        $cuisines = $this->cuisine->all();

        $weekdays = [
            1 => __('Monday'),
            2 => __('Tuesday'),
            3 => __('Wednesday'),
            4 => __('Thursday'),
            5 => __('Friday'),
            6 => __('Saturday'),
            0 => __('Sunday'),
        ];

        $times = [
            '12 AM',
            '12.30 AM',
            '1 AM',
            '1.30 AM',
            '2 AM',
            '2.30 AM',
            '3 AM',
            '3.30 AM',
            '4 AM',
            '4.30 AM',
            '5 AM',
            '5.30 AM',
            '6 AM',
            '6.30 AM',
            '7 AM',
            '7.30 AM',
            '8 AM',
            '8.30 AM',
            '9 AM',
            '9.30 AM',
            '10 AM',
            '10.30 AM',
            '11 AM',
            '11.30 AM',
            '12 PM',
            '12.30 PM',
            '1 PM',
            '1.30 PM',
            '2 PM',
            '2.30 PM',
            '3 PM',
            '3.30 PM',
            '4 PM',
            '4.30 PM',
            '5 PM',
            '5.30 PM',
            '6 PM',
            '6.30 PM',
            '7 PM',
            '7.30 PM',
            '8 PM',
            '8.30 PM',
            '9 PM',
            '9.30 PM',
            '10 PM',
            '10.30 PM',
            '11 PM',
            '11.30 PM',
        ];


        if ($restaurant->online_from_time) {
            $restaurant->online_from_time = Carbon::parse($restaurant->online_from_time)->format('Y-m-d\TH:i');
        }
        if ($restaurant->online_to_time) {
            $restaurant->online_to_time = Carbon::parse($restaurant->online_to_time)->format('Y-m-d\TH:i');
        }


        return view('master-admin.request.restaurant', [
            'restaurant' => $restaurant,
            'cuisines' => $cuisines,
            'weekdays' => $weekdays,
            'times' => $times,
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function restaurantUpdate(Request $request)
    {
        $request->online_from_time = Carbon::parse($request->online_from_time)->toDateTimeString();
        $request->online_to_time = Carbon::parse($request->online_to_time)->toDateTimeString();

        $restaurant_clone = $this->clone->getRestaurant($request->id);

        $restaurant = $restaurant_clone->restaurant()->withTrashed()->first();

        if ($restaurant_clone->update_type != 'discount') {

            if ($request->parking == 'true') {
                $request->request->set('parking', true);
            } else {
                $request->request->set('parking', false);
            }

            if ($request->takeaway == 'true') {
                $request->request->set('takeaway', true);
            } else {
                $request->request->set('takeaway', false);
            }

            if ($request->delivery == 'true') {
                $request->request->set('delivery', true);
            } else {
                $request->request->set('delivery', false);
            }

            if ($request->reserve == 'true') {
                $request->request->set('reserve', true);
            } else {
                $request->request->set('reserve', false);
            }
        }
        $restaurant_clone->update($request->except([
            'days',
            '_token',
            '_method',
            'street',
            'selected',
            'cuisines',
        ]));

        if ($request->cuisines) {

            $restaurant_clone->cuisines()->detach();

            foreach ($request->cuisines as $cuisine) {
                $restaurant_clone->cuisines()->attach($cuisine);
            }

        }

        $restaurant->openingHourClone()->forceDelete();

        if ($request->days) {
            foreach ($request->days as $key => $day) {
                if ($day['opening_time'] || $day['closing_time']) {
                    $day['restaurant_id'] = $restaurant->id;
//                    $day['day'] = $day['day'];
                    $clone = $restaurant->openingHourClone()->create($day);
                }
            }
        }

        $restaurant->update($restaurant_clone->toArray());

        $restaurant->restore();

        if ($request->cuisines) {

            $restaurant->cuisines()->detach();

            foreach ($restaurant_clone->cuisines as $cuisine) {
                $restaurant_clone->restaurant->cuisines()->attach($cuisine->id);
            }
        }
        if ($request->days) {
            $restaurant->openingHours()->forceDelete();

            foreach ($restaurant->openingHourClone as $item) {
                $restaurant->openingHours()->create($item->toArray());
            }

            $restaurant->openingHourClone()->forceDelete();
        }

        $restaurant_clone->forceDelete();

        if ($request->expectsJson()) {
            return response()->json([
                'message' => 'success',
                'data' => []
            ]);
        } else {
            if ($restaurant_clone) {
                $request->session()->flash('success', 'Updated successfully!');
                return redirect(route('master-admin.request.index'));
            }
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function delivery(Request $request)
    {
        $restaurant_id = $request->restaurant_id;

        $restaurant = $this->restaurant->getRestaurant($restaurant_id);

        $delivery_locations = $this->clone->getDeliveryLocations($restaurant_id);

        foreach ($delivery_locations as $delivery_location) {
            if ($delivery_location->trashed()) {
                $delivery_location->deleted = false;
            } else {
                $delivery_location->deleted = true;
            }
        }

        return view('master-admin.request.delivery-locations', [
            'delivery_locations' => $delivery_locations,
            'restaurant' => $restaurant
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deliveryUpdate(Request $request)
    {
        $restaurant = $this->restaurant->getRestaurant($request->restaurant_id);

        $restaurant->deliveryLocationClone()->forceDelete();

        foreach ($request->delivery_locations as $delivery_location) {
            $clone = $restaurant->deliveryLocationClone()->create($delivery_location);
            if (!$delivery_location['deleted']) {
                $clone->delete();
            }
        }

        $restaurant->deliveryLocations()->forceDelete();

        foreach ($restaurant->deliveryLocationClone as $delivery_location) {
            $clone = $restaurant->deliveryLocations()->create($delivery_location->toArray());
            if ($delivery_location->deleted_at) {
                $clone->delete();
            }
        }

        $restaurant->deliveryLocationClone()->forceDelete();

        return response()->json([
            'message' => 'success',
            'data' => []
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function takeaway(Request $request)
    {
        $restaurant_id = $request->restaurant_id;

        $restaurant = $this->restaurant->getRestaurant($restaurant_id);

        $takeaway_locations = $this->clone->getTakeawayLocations($restaurant_id);

        foreach ($takeaway_locations as $takeaway_location) {
            if ($takeaway_location->trashed()) {
                $takeaway_location->deleted = false;
            } else {
                $takeaway_location->deleted = true;
            }
        }

        return view('master-admin.request.takeaway-locations', [
            'takeaway_locations' => $takeaway_locations,
            'restaurant' => $restaurant,
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function takeawayUpdate(Request $request)
    {
        $restaurant = $this->restaurant->getRestaurant($request->restaurant_id);

        $restaurant->takeawayLocationClone()->forceDelete();

        foreach ($request->takeaway_locations as $takeaway_location) {
            $clone = $restaurant->takeawayLocationClone()->create($takeaway_location);
            if (!$takeaway_location['deleted']) {
                $clone->delete();
            }
        }

        $restaurant->takeawayLocations()->forceDelete();

        foreach ($restaurant->takeawayLocationClone as $takeaway_location) {
            $clone = $restaurant->takeawayLocations()->create($takeaway_location->toArray());
            if ($takeaway_location->deleted_at) {
                $clone->delete();
            }
        }

        $restaurant->takeawayLocationClone()->forceDelete();

        return response()->json([
            'message' => 'success',
            'data' => []
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function promotion(Request $request)
    {
        $clone = $this->clone->getRestaurant($request->restaurant_id);

        $restaurant = $this->restaurant->getRestaurant($request->restaurant_id);

        if (!$clone) {
            $clone = $restaurant->restaurantClone()->create($restaurant->toArray());
        }

        $promotions = $restaurant->promotionClones()->withTrashed()->get();

        foreach ($promotions as $promotion) {
            $promotion->deleted = true;
            if ($promotion->trashed()) {
                $promotion->deleted = false;
            }
        }

        return view('master-admin.request.promotion', [
            'promotions' => $promotions,
            'restaurant' => $restaurant,
            'clone' => $clone,
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function promotionUpdate(Request $request)
    {
        $restaurant = $this->restaurant->getRestaurant($request->restaurant_id);

        $count = $restaurant->restaurantClone()->count();

        if ($count) {
            $restaurant->restaurantClone()->update($request->except([
                'promotions',
                '_token',
            ]));
        }

//        if ($request->promotions) {
//            $restaurant->promotionClones()->forceDelete();
//            foreach ($request->promotions as $promotion) {
//                $promotion['restaurant_id'] = $restaurant->id;
//                $clone = $restaurant->promotionClones()->create($promotion);
//                if (!$promotion['deleted']) {
//                    $clone->delete();
//                }
//            }
//        }

        $count = $restaurant->count();

        if ($count) {
            $restaurant->update($request->except([
                'promotions',
                '_token',
            ]));
        }

        if ($request->promotions) {
//            $restaurant->promotions()->delete();
            foreach ($request->promotions as $promotion) {
                $promotion['restaurant_id'] = $restaurant->id;

                $update_flag = false;
                $update_promotion = [];

                foreach ($restaurant->promotions()->get() as $restaurant_promotion) {
                    if ($restaurant_promotion->promocode == $promotion['promocode']) {
                        $update_flag = true;
                        $update_promotion = $restaurant_promotion;
                    }
                }

                if ($update_flag) {
                    $clone = $update_promotion;
                    $update_promotion->update($promotion);
                } else {
                    $clone = $restaurant->promotions()->create($promotion);

                }
                if (isset($promotion['deleted']) && !$promotion['deleted']) {
                    $clone->delete();
                }
            }
        }

        $restaurant->promotionClones()->forceDelete();

        $restaurant->restaurantClone()->forceDelete();

        return response()->json([
            'message' => 'success',
            'data' => [

            ]
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function menu(Request $request)
    {
        $restaurant_id = $request->restaurant_id;

        $restaurant = $this->restaurant->getRestaurant($restaurant_id);

        $menus = $restaurant->menuClones()->withTrashed()->get();

        return view('master-admin.request.menu', [
            'restaurant' => $restaurant,
            'menus' => $menus
        ]);
    }

    public function menuItems(Request $request)
    {
        $restaurant_id = $request->restaurant_id;

        $restaurant = $this->restaurant->getRestaurant($restaurant_id);

        $menus = $restaurant->menus()->get();

        $menu_items = [];

        foreach ($menus as $menu) {
            if (count($menu->menuItemClones()->withTrashed()->get())) {
                foreach ($menu->menuItemClones()->withTrashed()->get() as $item) {
                    $menu_items[] = $item;
                }
            }
        }

        return view('master-admin.request.menu-item', [
            'restaurant' => $restaurant,
            'menu_items' => $menu_items
        ]);
    }
}
