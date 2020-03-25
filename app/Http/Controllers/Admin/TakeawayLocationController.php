<?php

namespace App\Http\Controllers\Admin;

use App\Repository\RestaurantRepository;
use App\TakeawayLocation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restaurant_id = Auth::user()->restaurant()->withTrashed()->first()->id;
        $takeaway_locations = $this->restaurant->getTakeawayLocations($restaurant_id);

        foreach ($takeaway_locations as $takeaway_location) {
            if ($takeaway_location->trashed()) {
                $takeaway_location->deleted = false;
            } else {
                $takeaway_location->deleted = true;
            }
        }

        return view('admin.takeaway-location.index', [
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if (config('app.product_type') == 'single') {
            $restaurant = Auth::user()->restaurant()->withTrashed()->first();

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
        } else {

            $restaurant = Auth::user()->restaurant()->withTrashed()->first();

            $restaurant->takeawayLocationClone()->forceDelete();

            foreach ($request->takeaway_locations as $takeaway_location) {
                $clone = $restaurant->takeawayLocationClone()->create($takeaway_location);
                if (!$takeaway_location['deleted']) {
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
     * @param \App\TakeawayLocation $takeawayLocation
     * @return \Illuminate\Http\Response
     */
    public function show(TakeawayLocation $takeawayLocation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\TakeawayLocation $takeawayLocation
     * @return \Illuminate\Http\Response
     */
    public function edit(TakeawayLocation $takeawayLocation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\TakeawayLocation $takeawayLocation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TakeawayLocation $takeawayLocation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\TakeawayLocation $takeawayLocation
     * @return \Illuminate\Http\Response
     */
    public function destroy(TakeawayLocation $takeawayLocation)
    {
        //
    }
}
