<?php

namespace App\Http\Controllers\Admin;

use App\Repository\TicketRepository;
use App\Ticket;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

/**
 * Class TicketController
 * @package App\Http\Controllers\Admin
 */
class TicketController extends Controller
{

    protected $ticket;

    /**
     * TicketController constructor.
     * @param TicketRepository $ticket_repository
     */
    public function __construct(TicketRepository $ticket_repository)
    {
        $this->ticket = $ticket_repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $deliveries = Auth::user()->restaurant()->withTrashed()->first()->deliveries()->get();

        $tickets = [];

        foreach ($deliveries as $delivery) {
            $delivery->ticket = $delivery->ticket()->first();
            if ($delivery->ticket) {
                $delivery->ticket->messages = $delivery->ticket->ticketMessages()->get();
                $tickets[] = $delivery->ticket;
            }
        }


        $takeaways = Auth::user()->restaurant()->withTrashed()->first()->takeaways()->get();

        foreach ($takeaways as $takeaway) {
            $takeaway->ticket = $takeaway->ticket()->first();
            if ($takeaway->ticket) {
                $takeaway->ticket->messages = $takeaway->ticket->ticketMessages()->get();
                $tickets[] = $takeaway->ticket;
            }
        }

        foreach ($tickets as $ticket) {
            $ticket->date = Carbon::parse($ticket->created_at)->toFormattedDateString();
            $ticket->user = $ticket->user()->withTrashed()->first();
            $ticket->resolved = (bool)$ticket->resolved;
            foreach ($ticket->messages as $message) {
                $message->date = Carbon::parse($message->created_at)->toFormattedDateString();
            }
        }

        return view('admin.ticket.index', ['tickets' => $tickets]);
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
     * @param \App\Ticket $ticket
     * @return \Illuminate\Http\Response
     */
    public function show(Ticket $ticket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Ticket $ticket
     * @return \Illuminate\Http\Response
     */
    public function edit(Ticket $ticket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Ticket $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ticket $ticket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Ticket $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticket $ticket)
    {
        //
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function restaurantMessage(Request $request)
    {
        $restaurant = Auth::user()->restaurant()->withTrashed()->first();

        $request->request->set('restaurant_id', $restaurant->id);

        if ($request->message != null) {
            $ticket_message = $this->ticket->createMessage($request->all());
        } else {
            $ticket_message = [];
        }

        $update = $this->ticket->updateResolved($request->ticket_id, $request->resolved);

        $ticket_message->date = Carbon::parse($ticket_message->created_at)->toFormattedDateString();

        if ($ticket_message || $update) {
            return response()->json([
                'message' => 'success',
                'data' => [
                    'ticket_message' => $ticket_message
                ]
            ]);
        }
    }
}
