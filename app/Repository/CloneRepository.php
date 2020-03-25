<?php
/**
 * Created by PhpStorm.
 * User: janaka
 * Date: 19/03/19
 * Time: 11:04 AM
 */

namespace App\Repository;


use App\Cuisine;
use App\DeliveryLocationClone;
use App\MenuClone;
use App\MenuItemClone;
use App\OpeningHourClone;
use App\PromotionClone;
use App\RestaurantClone;
use App\TakeawayLocationClone;
use Illuminate\Support\Facades\DB;

/**
 * Class CloneRepository
 * @package App\Repository
 */
class CloneRepository
{
    /**
     * @param string $from_date
     * @param string $to_date
     * @return mixed
     */
    public function getRestaurants(string $from_date, string $to_date)
    {
        return RestaurantClone::withTrashed()
            ->where('created_at', '>=', $from_date)
            ->where('created_at', '<=', $to_date)
            ->get();
    }

    /**
     * @param string $from_date
     * @param string $to_date
     * @return mixed
     */
    public function getDeliveries(string $from_date, string $to_date)
    {
        return DeliveryLocationClone::withTrashed()->groupBy('restaurant_id')
            ->where('created_at', '>=', $from_date)
            ->where('created_at', '<=', $to_date)
            ->get();
    }

    /**
     * @param string $from_date
     * @param string $to_date
     * @return mixed
     */
    public function getTakeaways(string $from_date, string $to_date)
    {
        return TakeawayLocationClone::withTrashed()->groupBy('restaurant_id')
            ->where('created_at', '>=', $from_date)
            ->where('created_at', '<=', $to_date)
            ->get();
    }

    /**
     * @param string $from_date
     * @param string $to_date
     * @return mixed
     */
    public function getPromotions(string $from_date, string $to_date)
    {
        return PromotionClone::withTrashed()->groupBy('restaurant_id')
            ->where('created_at', '>=', $from_date)
            ->where('created_at', '<=', $to_date)
            ->get();
    }

    /**
     * @return mixed
     */
    public function getOpeningHours()
    {
        return OpeningHourClone::withTrashed()->groupBy('restaurant_id')->get();
    }

    /**
     * @param int $restaurant_id
     * @return mixed
     */
    public function getRestaurant(int $restaurant_id)
    {
        return RestaurantClone::withTrashed()->where('restaurant_id', '=', $restaurant_id)->first();
    }

    /**
     * @param int $restaurant_id
     * @return mixed
     */
    public function getDeliveryLocations(int $restaurant_id)
    {
        return DeliveryLocationClone::withTrashed()->where('restaurant_id', '=', $restaurant_id)->get();
    }

    /**
     * @param int $restaurant_id
     * @return mixed
     */
    public function getTakeawayLocations(int $restaurant_id)
    {
        return TakeawayLocationClone::withTrashed()->where('restaurant_id', '=', $restaurant_id)->get();
    }

    /**
     * @param string $from_date
     * @param string $to_date
     * @return mixed
     */
    public function getMenus(string $from_date, string $to_date)
    {
        return MenuClone::withTrashed()->groupBy('restaurant_id')
            ->where('created_at', '>=', $from_date)
            ->where('created_at', '<=', $to_date)
            ->get();
    }

    /**
     * @param string $from_date
     * @param string $to_date
     * @return mixed
     */
    public function getMenuItems(string $from_date, string $to_date)
    {
        return MenuItemClone::hydrate(DB::select(DB::raw("select menu_item_clones.*
from menu_item_clones
         inner join menus on menu_item_clones.menu_id = menus.id
#where menu_item_clones.created_at >= $from_date and menu_item_clones.created_at <= $to_date
group by restaurant_id;")));
    }
}
