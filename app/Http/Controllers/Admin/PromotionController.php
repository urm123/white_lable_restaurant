<?php

namespace App\Http\Controllers\Admin;

use App\Promotion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PromotionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restaurant = Auth::user()->restaurant()->withTrashed()->first();
        $promotions = $restaurant->promotions()->withTrashed()->get();

        foreach ($promotions as $promotion) {

            $promotion->deleted = false;

            if ($promotion->trashed()) {
                $promotion->deleted = true;
            }

            $promotion->usage_count = $promotion->deliveries()->count() + $promotion->takeaways()->count();
        }

        return view('admin.promotion.index', [
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
        if (config('app.product_type') == 'single') {
            $restaurant = Auth::user()->restaurant()->withTrashed()->first();

            $restaurant->update($request->except([
                'promotions',
                '_token',
                'usage_count'
            ]));

            if ($request->promotions) {
                $restaurant->promotions()->forceDelete();

                foreach ($request->promotions as $promotion) {
                    $promotion['restaurant_id'] = $restaurant->id;
                    $promotion_copy = $promotion;
                    unset($promotion_copy['deleted']);
                    unset($promotion_copy['usage_count']);
                    $clone = $restaurant->promotions()->firstOrCreate($promotion_copy);
                    if (isset($promotion['deleted'])) {
                        if ($promotion['deleted']) {
                            $clone->delete();
                        } else {
                            $clone->restore();
                        }
                    }
                }
            }


            return response()->json([
                'message' => 'success',
                'data' => [

                ]
            ]);
        } else {

            $restaurant = Auth::user()->restaurant()->withTrashed()->first();

            $count = $restaurant->restaurantClone()->count();

            if ($count) {
                $restaurant->restaurantClone()->update($request->except([
                    'promotions',
                    '_token',
                    'usage_count'
                ]));
            } else {
                $restaurant->restaurantClone()->create($restaurant->toArray());
                $restaurant->restaurantClone()->update($request->except([
                    'promotions',
                    '_token',
                    'usage_count'
                ]));
            }

            if ($request->promotions) {
                $restaurant->promotionClones()->forceDelete();
                foreach ($request->promotions as $promotion) {
                    $promotion['restaurant_id'] = $restaurant->id;
                    $promotion_copy = $promotion;
                    unset($promotion_copy['deleted']);
                    unset($promotion_copy['usage_count']);
                    $clone = $restaurant->promotionClones()->firstOrCreate($promotion_copy);
                    if (isset($promotion['deleted'])) {
                        if ($promotion['deleted']) {
                            $clone->delete();
                        } else {
                            $clone->restore();
                        }
                    }
                }
            }


            return response()->json([
                'message' => 'success',
                'data' => [

                ]
            ]);
        }
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
