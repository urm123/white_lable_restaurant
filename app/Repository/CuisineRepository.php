<?php
/**
 * Created by PhpStorm.
 * User: janaka
 * Date: 25/01/19
 * Time: 5:53 PM
 */

namespace App\Repository;


use App\Cuisine;
use Illuminate\Support\Facades\DB;

/**
 * Class CuisineRepository
 * @package App\Repository
 */
class CuisineRepository
{
    /**
     * @return Cuisine[]|\Illuminate\Database\Eloquent\Collection
     */
    public function all()
    {
        return Cuisine::all();
    }

    /**
     * @return mixed
     */
    public function getPopular()
    {
        return Cuisine::hydrate(DB::select(DB::raw("select cuisines.*, count(cuisine_restaurant.restaurant_id) as restaurant_count
from cuisines
       inner join cuisine_restaurant on cuisines.id = cuisine_restaurant.cuisine_id
     inner join restaurants on cuisine_restaurant.restaurant_id = restaurants.id
where restaurants.deleted_at is null and
      restaurants.online is true and
      cuisines.deleted_at is null and
      (!((restaurants.online_from_time is not null and restaurants.online_from_time is not null) and restaurants.online_from_time < now() and
      restaurants.online_to_time > now()) )
group by cuisines.id
order by restaurant_count desc
limit 5")));
    }

    /**
     * @param array $request
     * @return Cuisine
     */
    public function create(array $request)
    {
        $cuisine = new Cuisine($request);
        $cuisine->save();
        return $cuisine;
    }
}
