<?php


namespace App\Http\Controllers\Api\Web;


use App\Http\Controllers\Controller;
use App\Repository\RestaurantRepository;

class PageController extends Controller
{
    protected $restaurant;

    public function __construct(RestaurantRepository $restaurant_repository)
    {
        $this->restaurant = $restaurant_repository;
    }

    public function popularItems()
    {
        $popular_items = $this->restaurant->getPopularItems(1);

        foreach ($popular_items as $popular_item) {
            $popular_item->logo = getStorageUrl() . $popular_item->logo;
        }

        return response()->json([
            'status' => 'success',
            'data' => $popular_items
        ]);
    }
}
