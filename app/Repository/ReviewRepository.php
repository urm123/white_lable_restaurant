<?php
/**
 * Created by PhpStorm.
 * User: janaka
 * Date: 04/03/19
 * Time: 2:57 PM
 */

namespace App\Repository;


use App\Review;

/**
 * Class ReviewRepository
 * @package App\Repository
 */
class ReviewRepository
{
    /**
     * @param array $request
     * @return Review
     */
    public function create(array $request)
    {
        $review = new Review($request);
        $review->save();
        return $review;
    }

    /**
     * @param int $restaurant_id
     * @return mixed
     */
    public function allByRestaurant(int $restaurant_id)
    {
        return Review::where('restaurant_id', '=', $restaurant_id)
            ->orderBy('created_at', 'desc')
            ->get();
    }

    /**
     * @return mixed
     */
    public function all()
    {
        return Review::orderBy('created_at', 'desc')
            ->get();
    }

    /**
     * @param $from_date
     * @param $to_date
     * @return mixed
     */
    public function allByDate(string $from_date, string $to_date)
    {
        return Review::withTrashed()
            ->where('created_at', '>=', $from_date)
            ->where('created_at', '<=', $to_date)
            ->orderBy('created_at', 'desc')
            ->get();
    }

    /**
     * @param int $review_id
     * @return mixed
     */
    public function get(int $review_id)
    {
        return Review::withTrashed()->whereId($review_id)->first();
    }
}
