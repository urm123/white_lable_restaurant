<?php

namespace App\Http\Controllers\MasterAdmin;

use App\DeliveryLocation;
use App\Repository\RestaurantRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * Class DeliveryLocationController
 * @package App\Http\Controllers\MasterAdmin
 */
class DeliveryLocationController extends Controller
{

    protected $restaurant;

    /**
     * DeliveryLocationController constructor.
     * @param RestaurantRepository $restaurant_repository
     */
    public function __construct(RestaurantRepository $restaurant_repository)
    {
        $this->restaurant = $restaurant_repository;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $restaurant = $this->restaurant->getRestaurant($request->restaurant);

        $delivery_locations = $this->restaurant->getDeliveryLocations($restaurant->id);

        foreach ($delivery_locations as $delivery_location) {
            if ($delivery_location->trashed()) {
                $delivery_location->deleted = false;
            } else {
                $delivery_location->deleted = true;
            }
        }

        return view('master-admin.delivery-location.index', [
            'restaurant' => $restaurant,
            'delivery_locations' => $delivery_locations
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $restaurant = $this->restaurant->getRestaurant($request->restaurant_id);

        $restaurant->deliveryLocations()->forceDelete();

        foreach ($request->delivery_locations as $delivery_location) {
            $clone = $restaurant->deliveryLocations()->create($delivery_location);
            if (!$delivery_location['deleted']) {
                $clone->delete();
            }
        }

        return response()->json([
            'message' => 'success',
            'data' => []
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DeliveryLocation $deliveryLocation
     * @return \Illuminate\Http\Response
     */
    public function show(DeliveryLocation $deliveryLocation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DeliveryLocation $deliveryLocation
     * @return \Illuminate\Http\Response
     */
    public function edit(DeliveryLocation $deliveryLocation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\DeliveryLocation $deliveryLocation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DeliveryLocation $deliveryLocation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DeliveryLocation $deliveryLocation
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeliveryLocation $deliveryLocation)
    {
        //
    }
}
