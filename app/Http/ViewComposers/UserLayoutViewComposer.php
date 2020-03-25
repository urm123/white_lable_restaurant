<?php

namespace App\Http\ViewComposers;

use App\Repository\RestaurantRepository;

class UserLayoutViewComposer
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

        $todayDate = date('Y-m-d');
        $offlineDateBegin = date('Y-m-d', strtotime($restaurant_info->online_from_time));
        $offlineDateEnd = date('Y-m-d', strtotime($restaurant_info->online_to_time));
        if (($todayDate >= $offlineDateBegin) && ($todayDate <= $offlineDateEnd)){
            $offlineMode = 'yes';
        } else {
            $offlineMode = 'no';
        }

        $view->with('restaurant_info', $restaurant_info);
        $view->with('offlineMode', $offlineMode);
    }
}
