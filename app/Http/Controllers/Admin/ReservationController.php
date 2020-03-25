<?php

namespace App\Http\Controllers\Admin;

use App\Repository\ReservationRepository;
use App\Reservation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

/**
 * Class ReservationController
 * @package App\Http\Controllers\Admin
 */
class ReservationController extends Controller
{

    protected $reservation;

    /**
     * ReservationController constructor.
     * @param ReservationRepository $reservation_repository
     */
    public function __construct(ReservationRepository $reservation_repository)
    {
        $this->reservation = $reservation_repository;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $id = false;

        if ($request->id) {
            $id = $request->id;
        }
        return view('admin.reservation.index', ['id' => $id]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getReservations(Request $request)
    {

        $sort = $request->sort;

        $sortString = '';

        switch ($sort) {
            case 'pending':
                $sortString = "'pending','accepted','declined'";
                break;

            case 'accepted':
                $sortString = "'accepted','pending','declined'";
                break;

            case 'declined':
                $sortString = "'declined','pending','accepted'";
                break;
        }

        $reservations = Auth::user()
            ->restaurant
            ->reservations()
            ->whereRaw("date(time)>='$request->date_from'")
            ->whereRaw("date(time)<='$request->date_to'")
            ->orderByRaw('field(restaurant_status,' . $sortString . ')')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        foreach ($reservations as $reservation) {
            $reservation->user = $reservation->user()->first();
            $reservation->date = Carbon::parse($reservation->time)->toFormattedDateString();
            $reservation->display_time = Carbon::parse($reservation->time)->format('g:i A');
        }

        return response()->json([
            'message' => 'success',
            'data' => [
                'reservations' => $reservations
            ]
        ]);
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Reservation $reservation
     * @return \Illuminate\Http\Response
     */
    public function show(Reservation $reservation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Reservation $reservation
     * @return \Illuminate\Http\Response
     */
    public function edit(Reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Reservation $reservation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reservation $reservation)
    {

        if ($reservation->user->email == setting('guest_email_id')) {
            $user_email = $reservation->email;
        } else {
            $user_email = $reservation->user->email;
        }

        $restaurant = $reservation->restaurant()->first();
        $theme = setting('site_theme');

        if($theme == 'orange-peel') {
            $color_theme = '#ffbf00';
            $button_color = '#d38a0c';
        } elseif ($theme == 'whiskey') {
            $color_theme = '#d3a971';
            $button_color = '#d38a0c';
        } elseif ($theme == 'thunderbird') {
            $color_theme = '#cb1511';
            $button_color = '#900906';
        } elseif ($theme == 'amber') {
            $color_theme = '#ffbf00';
            $button_color = '#d38a0c';
        } elseif ($theme == 'apple') {
            $color_theme = '#409843';
            $button_color = '#2d5840';
        } else {
            $color_theme = '#2A8F38';
            $button_color = '#db6d13';
        }

        $theme = [
            'color_theme'       => $color_theme,
            'button_color'      => $button_color,
            'restaurant_email'  => $restaurant->email,
            'restaurant_tel'    => $restaurant->phone,
            'current_year'      => date('Y'),
            'terms_url'         => config('app.url').'/terms-and-conditions',
            'app_name'          => config('app.name'),
            'app_logo'          => asset('storage/'. $restaurant->logo)
        ];

        if ($request->all()['reservation']['restaurant_status'] == 'declined') {
            Mail::send(['html' => 'user.email.reservation-declined'], ['reservation' => $reservation, 'theme' => $theme],
                function ($message) use ($user_email) {
                    $message->to($user_email)
                        ->subject('Order declined');
                });
        }

        $update = $reservation->update($request->all()['reservation']);

        if ($update) {
            return response()->json([
                'message' => 'success',
                'data' => [
                    'reservation' => $reservation
                ]
            ]);
        } else {
            return response()->json([
                'message' => 'failed',
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Reservation $reservation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservation $reservation)
    {
        //
    }
}
