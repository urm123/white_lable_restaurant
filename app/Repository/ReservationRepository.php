<?php
/**
 * Created by PhpStorm.
 * User: janaka
 * Date: 28/02/19
 * Time: 2:52 PM
 */

namespace App\Repository;


use App\Reservation;

/**
 * Class ReservationRepository
 * @package App\Repository
 */
class ReservationRepository
{
    /**
     * @param array $request
     * @return Reservation
     */
    public function create(array $request)
    {
        $reservation = new Reservation($request);
        $reservation->save();
        return $reservation;
    }

    /**
     * @param int $user_id
     * @return mixed
     */
    public function getActive(int $user_id)
    {
        return Reservation::where('user_id', '=', $user_id)
            ->where('confirmed', '=', true)
            ->where('restaurant_status', '<>', 'declined')
            ->get();
    }

    /**
     * @return mixed
     */
    public function object()
    {
        return Reservation::orderBy('created_at', 'desc');
    }

    /**
     * @param int $reservation_id
     * @return mixed
     */
    public function get(int $reservation_id = 0)
    {
        return Reservation::whereId($reservation_id)->first();
    }
}
