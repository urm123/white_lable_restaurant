<?php

namespace App\Http\Controllers\Api\User;

use App\Promotion;
use App\Repository\MenuItemRepository;
use App\Repository\RestaurantRepository;
use App\Repository\SitePromotionRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PromotionController extends Controller
{

    protected $restaurant;

    protected $menu_item;

    protected $site_promotion;

    /**
     * PromotionController constructor.
     * @param RestaurantRepository $restaurant_repository
     * @param MenuItemRepository $menu_item_repository
     * @param SitePromotionRepository $site_promotion_repository
     */
    public function __construct(RestaurantRepository $restaurant_repository, MenuItemRepository $menu_item_repository, SitePromotionRepository $site_promotion_repository)
    {
        $this->restaurant = $restaurant_repository;
        $this->menu_item = $menu_item_repository;
        $this->site_promotion = $site_promotion_repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function validatePromocode(Request $request)
    {
        $restaurant_id = $request->restaurant_id;
        $promocode = $request->promocode;

        $promotion_data = [
            'validation' => false,
            'promotion' => []
        ];

        $restaurant = $this->restaurant->getRestaurant($restaurant_id);

        $restaurant_promotions = $restaurant->promotions()->where('promocode', '=', $promocode)->get();

        $site_promotions = $this->site_promotion->getByPromocode($promocode);

        $menu_items = $this->menu_item->getMenuItemsByPromocode($promocode);

        foreach ($restaurant_promotions as $restaurant_promotion) {
            $expired = Carbon::parse($restaurant_promotion->expiry_date);
            $started = Carbon::parse($restaurant_promotion->start_date);

            $restaurant_promotion_count = $restaurant_promotion->deliveries()->count() + $restaurant_promotion->takeaways()->count();

            if ($restaurant_promotion_count >= $restaurant_promotion->limit) {
                $promotion_data = [
                    'validation' => false,
                    'promotion' => 'Sorry, the limit exceeded for this promocode. Please try another promocode!'
                ];


                return response()->json([
                    'message' => 'success',
                    'data' => $promotion_data
                ]);
            }

            if (Carbon::now()->startOfDay()->lte($expired->startOfDay()) && Carbon::now()->startOfDay()->gte($started->startOfDay())) {
                $restaurant_promotion->method = 'restaurant';
                $promotion_data = [
                    'validation' => true,
                    'promotion' => $restaurant_promotion
                ];

                return response()->json([
                    'message' => 'success',
                    'data' => $promotion_data
                ]);
            }
        }

        foreach ($site_promotions as $site_promotion) {
            $expired = Carbon::parse($site_promotion->expiry_date);
            $started = Carbon::parse($site_promotion->start_date);


            $site_promotion_count = $site_promotion->deliveries()->count() + $site_promotion->takeaways()->count();

            if ($site_promotion_count >= $site_promotion->limit) {
                $promotion_data = [
                    'validation' => false,
                    'promotion' => 'Sorry, the limit exceeded for this promocode. Please try another promocode!'
                ];


                return response()->json([
                    'message' => 'success',
                    'data' => $promotion_data
                ]);
            }

            if (Carbon::now()->startOfDay()->lte($expired->startOfDay()) && Carbon::now()->startOfDay()->gte($started->startOfDay())) {
                $site_promotion->method = 'site';
                $promotion_data = [
                    'validation' => true,
                    'promotion' => $site_promotion
                ];


                return response()->json([
                    'message' => 'success',
                    'data' => $promotion_data
                ]);
            }
        }

        foreach ($menu_items as $menu_item) {
            $expired = Carbon::parse($menu_item->promo_date);

            $menu_item_count = $menu_item->deliveries()->where('created_at', '>', $menu_item->updated_at)->count();

            if ($menu_item_count >= $menu_item->promo_usage) {
                $promotion_data = [
                    'validation' => false,
                    'promotion' => 'Sorry, the limit exceeded for this promocode. Please try another promocode!'
                ];


                return response()->json([
                    'message' => 'success',
                    'data' => $promotion_data
                ]);
            }

            if (Carbon::now()->startOfDay()->lte($expired->startOfDay())) {
                $menu_item->method = 'menu_item';
                $promotion_data = [
                    'validation' => true,
                    'promotion' => $menu_item
                ];


                return response()->json([
                    'message' => 'success',
                    'data' => $promotion_data
                ]);
            }
        }

        return response()->json([
            'message' => 'success',
            'data' => $promotion_data
        ]);
    }
}
