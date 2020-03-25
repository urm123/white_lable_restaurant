<?php
/**
 * Created by PhpStorm.
 * User: janaka
 * Date: 25/01/19
 * Time: 2:49 PM
 */

namespace App\Repository;


use App\DeliveryLocation;
use App\MenuItem;
use App\Restaurant;
use App\RestaurantClone;
use App\RestaurantMedia;
use App\TakeawayLocation;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

/**
 * Class RestaurantRepository
 * @package App\Repository
 */
class RestaurantRepository
{
    /**
     * @param string $term
     * @param string $type
     * @return mixed
     */
    public function search(string $term, string $type)
    {
        return Restaurant::hydrate(DB::select(DB::raw("select restaurants.*
from restaurants
         left join cuisine_restaurant on restaurants.id = cuisine_restaurant.restaurant_id
         left join cuisines on cuisine_restaurant.cuisine_id = cuisines.id
where (restaurants.name like '%$term%'
    or restaurants.county like '%$term%'
    or restaurants.postcode like '%$term%'
    or restaurants.province like '%$term%'
    or restaurants.city like '%$term%'
    or cuisines.name like '%$term%')
  and restaurants.$type is true
  and restaurants.deleted_at is null and restaurants.online is true
and (!((restaurants.online_from_time is not null and restaurants.online_from_time is not null) and restaurants.online_from_time < now() and
      restaurants.online_to_time > now()) )
group by restaurants.id
order by case
             when restaurants.name like '%$term%' then 1
             when restaurants.county like '%$term%' then 2
             when restaurants.postcode like '%$term%' then 3
             when restaurants.province like '%$term%' then 4
             when restaurants.city like '%$term%' then 5
             when cuisines.name like '%$term%' then 6
             else 6 end;")));
    }

    /**
     * @param string $province
     * @param string $type
     * @return mixed
     */
    public function searchWithPostCode(string $postcode, string $type)
    {
        return Restaurant::hydrate(DB::select(DB::raw("select restaurants.*
from restaurants
       inner join cuisine_restaurant on restaurants.id = cuisine_restaurant.restaurant_id
       inner join cuisines on cuisine_restaurant.cuisine_id = cuisines.id
where restaurants.postcode like '%$province%'
  and restaurants.$type is true
  and restaurants.online is true
  and restaurants.deleted_at is null
and (!((restaurants.online_from_time is not null and restaurants.online_from_time is not null) and restaurants.online_from_time < now() and
      restaurants.online_to_time > now()) )
group by restaurants.id
order by case
           when restaurants.postcode like '%$postcode%' then 1
           else 2 end;")));
    }

    /**
     * @return Restaurant[]|\Illuminate\Database\Eloquent\Collection
     */
    public function all()
    {
        return Restaurant::where('online', '=', true)
            ->whereRaw('(!((restaurants.online_from_time is not null and restaurants.online_from_time is not null) and restaurants.online_from_time < now() and
      restaurants.online_to_time > now()) )')
            ->get();
    }

    /**
     * @param string $postcode
     * @return mixed
     */
    public function allByPostcode(string $postcode)
    {
        return Restaurant::wherePostcode($postcode)->whereOnline(true)->get();
    }

    /**
     * @return mixed
     */
    public function allWithDeleted()
    {
        return Restaurant::withTrashed()->get();
    }

    /**
     * @param int $limit
     * @return mixed
     */
    public function getPopularRestaurants()
    {
        return Restaurant::hydrate(DB::select(DB::raw("select restaurants.*
from restaurants
         left join reviews on restaurants.id = reviews.restaurant_id
where restaurants.deleted_at is null and restaurants.online is true and (!((restaurants.online_from_time is not null and restaurants.online_from_time is not null) and restaurants.online_from_time < now() and
      restaurants.online_to_time > now()) )
group by restaurants.id
order by (sum(rating)/count(rating)) desc")));
    }

    /**
     * @param int $restaurant_id
     * @return mixed
     */
    public function getRestaurant(int $restaurant_id)
    {
        return Restaurant::whereId($restaurant_id)->withTrashed()->first();
    }

    /**
     * @param int $restaurant_id
     * @return mixed
     */
    public function getDeliveryLocations(int $restaurant_id)
    {
        return DeliveryLocation::where('restaurant_id', '=', $restaurant_id)->withTrashed()->get();
    }

    /**
     * @param int $restaurant_id
     * @return mixed
     */
    public function getTakeawayLocations(int $restaurant_id)
    {
        return TakeawayLocation::where('restaurant_id', '=', $restaurant_id)->withTrashed()->get();
    }

    /**
     * @return RestaurantClone[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getRequests()
    {
        return RestaurantClone::all();
    }

    /**
     * @param int $restaurant_clone_id
     * @return mixed
     */
    public function getRequest(int $restaurant_clone_id)
    {
        return RestaurantClone::withTrashed()->whereId($restaurant_clone_id)->first();
    }

    /**
     * @param int $restaurant_id
     * @return mixed
     */
    public function getPopularItems(int $restaurant_id)
    {

//        @todo set "having count(menu_items.id) > 0" to "having count(menu_items.id) > 1"

        return MenuItem::hydrate(DB::select(DB::raw("select menu_items.*
from menu_items
       inner join menus on menu_items.menu_id = menus.id
       left join delivery_items on menu_items.id = delivery_items.menu_item_id
       left join takeaway_items on menu_items.id = takeaway_items.menu_item_id
where restaurant_id = $restaurant_id and menu_items.deleted_at is null and menus.deleted_at is null
group by menu_items.id
having count(menu_items.id) > 0 limit 15")));
    }

    /**
     * @param int $restaurant_id
     * @return mixed
     */
    public function delete(int $restaurant_id)
    {
        return Restaurant::whereId($restaurant_id)->delete();
    }

    /**
     * @param int $slider_id
     * @return mixed
     */
    public function deleteSlider(int $slider_id)
    {
        return RestaurantMedia::whereId($slider_id)->delete();
    }

    /**
     * @param int $user_id
     * @return mixed
     */
    public function getInterestingRestaurants(int $user_id)
    {
        return Restaurant::hydrate(DB::select(DB::raw("select restaurants.*
from restaurants
         inner join deliveries on restaurants.id = deliveries.restaurant_id
where deliveries.user_id = $user_id
group by restaurants.id;
")));
    }

    /**
     * @param string $today
     * @return mixed
     */
    public function promotionRestaurants(string $today)
    {
        return Restaurant::where('expiry_date', '>=', $today)
            ->where('start_date', '<=', $today)
            ->where('promocode', 'is', true)
            ->get();
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function getFirst(int $id)
    {
        return Restaurant::whereId($id)->first();
    }
}
