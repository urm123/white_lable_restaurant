<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Repository\ReservationRepository;
use App\Reservation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    protected $reservation;

    public function __construct(ReservationRepository $reservation_repository)
    {
        $this->reservation = $reservation_repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservations = Auth::user()->reservations;

        foreach ($reservations as $reservation) {
            $reservation->restaurant = $reservation->restaurant()->first();

            $restaurant_address = $reservation->restaurant->city . '+' . $reservation->restaurant->province . '+' . $reservation->restaurant->county . '+' . $reservation->restaurant->postcode;

            $reservation->restaurant->query_address = str_replace(' ', '+', $restaurant_address);

            $reservation->date = Carbon::parse($reservation->time)->toFormattedDateString();
            $reservation->time = Carbon::parse($reservation->time)->format('g:i A');
        }


        if ($reservations) {
            return response()->json([
                'message' => 'success',
                'data' => [
                    'reservations' => $reservations
                ]
            ]);
        } else {
            return response()->json([
                'message' => 'Failed'
            ], 400);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->request->set('user_id', Auth::id());

        $request->request->set('time', Carbon::parse($request->date . ' ' . $request->time)->toDateTimeString());

        $reservation = $this->reservation->create($request->all());

        if ($reservation) {
            return response()->json([
                'message' => 'success',
                'data' => [
                    'reservation' => $reservation
                ]
            ]);
        } else {
            return response()->json([
                'message' => 'Reservation save failed. Please try again.'
            ], 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Reservation $reservation
     * @return \Illuminate\Http\Response
     */
    public function show(Reservation $reservation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Reservation $reservation
     * @return \Illuminate\Http\Response
     */
    public function edit(Reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Reservation $reservation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reservation $reservation)
    {
        $update = $reservation->update($request->all());

        if ($update) {
            return response()->json([
                'message' => 'success',
                'data' => [
                    'reservation' => $update
                ]
            ]);
        } else {
            return response()->json([
                'message' => 'Reservation update failed. Please try again'
            ], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reservation $reservation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservation $reservation)
    {
        //
    }
}
