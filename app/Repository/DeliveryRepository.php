<?php
/**
 * Created by PhpStorm.
 * User: janaka
 * Date: 22/02/19
 * Time: 2:23 PM
 */

namespace App\Repository;


use App\Delivery;
use App\DeliveryItem;

/**
 * Class DeliveryRepository
 * @package App\Repository
 */
class DeliveryRepository
{
    /**
     * @param array $request
     * @return Delivery
     */
    public function create(array $request)
    {
        $delivery = new Delivery($request);
        $delivery->save();
        return $delivery;
    }

    /**
     * @param array $request
     * @return DeliveryItem
     */
    public function createDeliveryItem(array $request)
    {
        $delivery_item = new DeliveryItem($request);
        $delivery_item->save();
        return $delivery_item;
    }

    /**
     * @param int $user_id
     * @return mixed
     */
    public function get(int $user_id)
    {
        return Delivery::where('user_id', '=', $user_id)->get();
    }

    /**
     * @param int $user_id
     * @return mixed
     */
    public function getActive(int $user_id)
    {
        return Delivery::where('user_id', '=', $user_id)
            ->where('delivery_status', '<>', 'delivered')
            ->where('restaurant_status', '<>', 'declined')
            ->get();
    }

    /**
     * @return mixed
     */
    public function object()
    {
        return Delivery::orderBy('created_at', 'desc');
    }

    /**
     * @param int $delivery_id
     * @return mixed
     */
    public function getDelivery(int $delivery_id)
    {
        return Delivery::whereId($delivery_id)->first();
    }
}
