<?php

namespace App\Http\Controllers\MasterAdmin;

use App\Promotion;
use App\Repository\RestaurantRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * Class PromotionController
 * @package App\Http\Controllers\MasterAdmin
 */
class PromotionController extends Controller
{

    protected $restaurant;

    /**
     * PromotionController constructor.
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
    public function index(Request $request)
    {
        $restaurant = $this->restaurant->getRestaurant($request->restaurant);
        $promotions = $restaurant->promotions()->get();

        return view('master-admin.promotion.index', [
            'promotions' => $promotions,
            'restaurant' => $restaurant
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
        $restaurant = $this->restaurant->getRestaurant($request->restaurant_id);

        $count = $restaurant->count();

        if ($count) {
            $restaurant->update($request->except([
                'promotions',
                '_token',
            ]));
        } else {
            $restaurant->create($request->all());
        }

        if ($request->promotions) {
            $restaurant->promotions()->delete();
            foreach ($request->promotions as $promotion) {
                $promotion['restaurant_id'] = $restaurant->id;
                $clone = $restaurant->promotions()->create($promotion);
                if (isset($promotion['deleted']) && $promotion['deleted']) {
                    $clone->delete();
                }
            }
        }


        return response()->json([
            'message' => 'success',
            'data' => [

            ]
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Promotion $promotion
     * @return \Illuminate\Http\Response
     */
    public function show(Promotion $promotion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Promotion $promotion
     * @return \Illuminate\Http\Response
     */
    public function edit(Promotion $promotion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Promotion $promotion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Promotion $promotion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Promotion $promotion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Promotion $promotion)
    {
        //
    }
}
