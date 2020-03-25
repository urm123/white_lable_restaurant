<?php

namespace App\Http\Controllers\MasterAdmin;

use App\Repository\RestaurantRepository;
use App\TakeawayLocation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * Class TakeawayLocationController
 * @package App\Http\Controllers\MasterAdmin
 */
class TakeawayLocationController extends Controller
{
    protected $restaurant;

    /**
     * TakeawayLocationController constructor.
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

        $takeaway_locations = $this->restaurant->getTakeawayLocations($restaurant->id);

        foreach ($takeaway_locations as $takeaway_location) {
            if ($takeaway_location->trashed()) {
                $takeaway_location->deleted = false;
            } else {
                $takeaway_location->deleted = true;
            }
        }

        return view('master-admin.takeaway-location.index', [
            'restaurant' => $restaurant,
            'takeaway_locations' => $takeaway_locations
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $restaurant = $this->restaurant->getRestaurant($request->restaurant_id);

        $restaurant->takeawayLocations()->forceDelete();

        foreach ($request->takeaway_locations as $takeaway_location) {
            $clone = $restaurant->takeawayLocations()->create($takeaway_location);
            if (!$takeaway_location['deleted']) {
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
     * @param  \App\TakeawayLocation $takeawayLocation
     * @return \Illuminate\Http\Response
     */
    public function show(TakeawayLocation $takeawayLocation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TakeawayLocation $takeawayLocation
     * @return \Illuminate\Http\Response
     */
    public function edit(TakeawayLocation $takeawayLocation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\TakeawayLocation $takeawayLocation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TakeawayLocation $takeawayLocation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TakeawayLocation $takeawayLocation
     * @return \Illuminate\Http\Response
     */
    public function destroy(TakeawayLocation $takeawayLocation)
    {
        //
    }
}
