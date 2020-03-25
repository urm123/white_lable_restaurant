<?php

namespace App\Http\Controllers\Admin;

use App\DeliveryLocation;
use App\Repository\RestaurantRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use function config;

/**
 * Class DeliveryLocationController
 * @package App\Http\Controllers\Admin
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restaurant_id = Auth::user()->restaurant()->withTrashed()->first()->id;
        $delivery_locations = $this->restaurant->getDeliveryLocations($restaurant_id);

        foreach ($delivery_locations as $delivery_location) {
            if ($delivery_location->trashed()) {
                $delivery_location->deleted = false;
            } else {
                $delivery_location->deleted = true;
            }
        }

        return view('admin.delivery-location.index', [
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
        if (config('app.product_type') == 'single') {
            $restaurant = Auth::user()->restaurant()->withTrashed()->first();

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
        } else {

            $restaurant = Auth::user()->restaurant()->withTrashed()->first();

            $restaurant->deliveryLocationClone()->forceDelete();

            foreach ($request->delivery_locations as $delivery_location) {
                $clone = $restaurant->deliveryLocationClone()->create($delivery_location);
                if (!$delivery_location['deleted']) {
                    $clone->delete();
                }
            }

            return response()->json([
                'message' => 'success',
                'data' => []
            ]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param \App\DeliveryLocation $deliveryLocation
     * @return \Illuminate\Http\Response
     */
    public function show(DeliveryLocation $deliveryLocation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\DeliveryLocation $deliveryLocation
     * @return \Illuminate\Http\Response
     */
    public function edit(DeliveryLocation $deliveryLocation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\DeliveryLocation $deliveryLocation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DeliveryLocation $deliveryLocation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\DeliveryLocation $deliveryLocation
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeliveryLocation $deliveryLocation)
    {
        //
    }
}
