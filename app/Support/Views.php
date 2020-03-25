<?php
/**
 * Created by PhpStorm.
 * User: janaka
 * Date: 19/03/19
 * Time: 3:43 PM
 */

namespace App\Support;

use App\Delivery;
use App\DeliveryLocationClone;
use App\MenuClone;
use App\MenuItemClone;
use App\PromotionClone;
use App\Reservation;
use App\RestaurantClone;
use App\Subscription;
use App\Takeaway;
use App\TakeawayLocationClone;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

/**
 * Class Views
 * @package App\Support
 */
class Views
{
    /**
     * @return mixed
     */
    public function notificationCount()
    {
        $from_date = Carbon::now()->subMonth()->toDateTimeString();
        $to_date = Carbon::now()->addDay()->toDateTimeString();

        $clones = RestaurantClone::withTrashed()
            ->where('created_at', '<=', $to_date)
            ->where('created_at', '>=', $from_date)
            ->orderBy('restaurant_id')
            ->count();

        $deliveries = DeliveryLocationClone::withTrashed()
            ->where('created_at', '<=', $to_date)
            ->where('created_at', '>=', $from_date)
            ->orderBy('restaurant_id')
            ->get();

        $takeaways = TakeawayLocationClone::withTrashed()
            ->where('created_at', '<=', $to_date)
            ->where('created_at', '>=', $from_date)
            ->orderBy('restaurant_id')
            ->get();

        $promotions = PromotionClone::withTrashed()
            ->where('created_at', '<=', $to_date)
            ->where('created_at', '>=', $from_date)
            ->orderBy('restaurant_id')
            ->count();

        $menus = MenuClone::withTrashed()
            ->where('created_at', '<=', $to_date)
            ->where('created_at', '>=', $from_date)
            ->orderBy('restaurant_id')
            ->get();

        $menu_items = MenuItemClone::hydrate(DB::select(DB::raw("select restaurant_id
from menu_item_clones
         inner join menus on menu_item_clones.menu_id = menus.id
group by restaurant_id
order by restaurant_id;")));

        $deliveries_count = 0;
        $deliveries_restaurants = [];

        $takeaways_count = 0;
        $takeaways_restaurants = [];

        $menus_count = 0;
        $menus_restaurants = [];

        $menu_items_count = 0;
        $menu_items_restaurants = [];

        foreach ($deliveries as $delivery) {
            if (array_search($delivery->restaurant_id, $deliveries_restaurants) === false) {
                $deliveries_restaurants[] = $delivery->restaurant_id;
                $deliveries_count++;
            }
        }

        foreach ($takeaways as $takeaway) {
            if (array_search($takeaway->restaurant_id, $takeaways_restaurants) === false) {
                $takeaways_restaurants[] = $takeaway->restaurant_id;
                $takeaways_count++;
            }
        }

        foreach ($menus as $menu) {
            if (array_search($menu->restaurant_id, $menus_restaurants) === false) {
                $menus_restaurants[] = $menu->restaurant_id;
                $menus_count++;
            }
        }

        foreach ($menu_items as $menu_item) {
            if (array_search($menu_item->restaurant_id, $menu_items_restaurants) === false) {
                $menu_items_restaurants[] = $menu_item->restaurant_id;
                $menu_items_count++;
            }
        }

//        dd($clones . '<>' . $deliveries_count . '<>' . $takeaways_count . '<>' . $promotions . '<>' . $menus_count . '<>' . $menu_items_count);

        return $clones + $deliveries_count + $takeaways_count + $promotions + $menus_count + $menu_items_count;
    }

    /**
     * @return Subscription[]|\Illuminate\Database\Eloquent\Collection
     */
    public function subscriptions()
    {
        return Subscription::all();
    }

    /**
     * @return mixed
     */
    public function reservations()
    {
        return Reservation::whereRestaurantStatus('pending')->count();
    }

    /**
     * @return mixed
     */
    public function deliveries()
    {
        return Delivery::whereRestaurantStatus('pending')->count();
    }

    /**
     * @return mixed
     */
    public function takeaways()
    {
        return Takeaway::whereRestaurantStatus('pending')->count();
    }
}
