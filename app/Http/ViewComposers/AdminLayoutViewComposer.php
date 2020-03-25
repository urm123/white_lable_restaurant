<?php

namespace App\Http\ViewComposers;

use App\Repository\RestaurantRepository;

class AdminLayoutViewComposer
{
    protected $restaurant;

    /**
     * PageController constructor.
     * @param RestaurantRepository $restaurant_repository
     */
    public function __construct(
        RestaurantRepository $restaurant_repository
    )
    {
        $this->restaurant = $restaurant_repository;
    }

    public function compose($view)
    {
        $restaurant_info = $this->restaurant->getRestaurant(1);

        $view->with('restaurant_info', $restaurant_info);
    }
}
