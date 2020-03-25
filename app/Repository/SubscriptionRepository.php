<?php
/**
 * Created by PhpStorm.
 * User: janaka
 * Date: 18/03/19
 * Time: 3:55 PM
 */

namespace App\Repository;


use App\Subscription;

/**
 * Class SubscriptionRepository
 * @package App\Repository
 */
class SubscriptionRepository
{
    /**
     * @return Subscription[]|\Illuminate\Database\Eloquent\Collection
     */
    public function all()
    {
        return Subscription::all();
    }
}