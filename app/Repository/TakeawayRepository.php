<?php
/**
 * Created by PhpStorm.
 * User: janaka
 * Date: 22/02/19
 * Time: 2:23 PM
 */

namespace App\Repository;


use App\Takeaway;
use App\TakeawayItem;

/**
 * Class TakeawayRepository
 * @package App\Repository
 */
class TakeawayRepository
{
    /**
     * @param array $request
     * @return Takeaway
     */
    public function create(array $request)
    {
        $takeaway = new Takeaway($request);
        $takeaway->save();
        return $takeaway;
    }

    /**
     * @param array $request
     * @return TakeawayItem
     */
    public function createTakeawayItem(array $request)
    {
        $takeaway_item = new TakeawayItem($request);
        $takeaway_item->save();
        return $takeaway_item;
    }

    /**
     * @param int $user_id
     * @return mixed
     */
    public function get(int $user_id)
    {
        return Takeaway::where('user_id', '=', $user_id)->get();
    }

    /**
     * @param int $user_id
     * @return mixed
     */
    public function getActive(int $user_id)
    {
        return Takeaway::where('user_id', '=', $user_id)
            ->where('takeaway_status', '<>', 'delivered')
            ->where('restaurant_status', '<>', 'declined')
            ->get();
    }

    /**
     * @return mixed
     */
    public function object()
    {
        return Takeaway::orderBy('created_at', 'desc');
    }

    /**
     * @param int $takeaway_id
     * @return mixed
     */
    public function getTakeaway(int $takeaway_id)
    {
        return Takeaway::whereId($takeaway_id)->first();
    }
}
