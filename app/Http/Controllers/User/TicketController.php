<?php

namespace App\Http\Controllers\User;

use App\Repository\DeliveryRepository;
use App\Repository\TicketRepository;
use App\Ticket;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

/**
 * Class TicketController
 * @package App\Http\Controllers\User
 */
class TicketController extends Controller
{
    protected $ticket;

    protected $delivery;

    /**
     * TicketController constructor.
     * @param TicketRepository $ticket_repository
     * @param DeliveryRepository $delivery_repository
     */
    public function __construct(TicketRepository $ticket_repository, DeliveryRepository $delivery_repository)
    {
        $this->ticket = $ticket_repository;
        $this->delivery = $delivery_repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ticket $ticket
     * @return \Illuminate\Http\Response
     */
    public function show(Ticket $ticket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ticket $ticket
     * @return \Illuminate\Http\Response
     */
    public function edit(Ticket $ticket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Ticket $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ticket $ticket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ticket $ticket
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
    public function userMessage(Request $request)
    {
        $user_id = Auth::id();

        $request->request->set('user_id', $user_id);
        if ($request->ticket_id) {
            if ($request->message != null) {
                $ticket_message = $this->ticket->createMessage($request->all());
            } else {
                $ticket_message = [];
            }
            $ticket = $ticket_message->ticket()->first();
        } else {
            $request->request->set('resolved', false);
            $ticket = $this->ticket->createTicket($request->all());
            $request->request->set('ticket_id', $ticket->id);
            $ticket_message = $this->ticket->createMessage($request->all());
        }
//        $update = $this->ticket->updateResolved($request->ticket_id, $request->resolved);

        if ($ticket) {
            $ticket->date = Carbon::parse($ticket->created_at)->toFormattedDateString();
            $ticket->messages = $ticket->ticketMessages()->get();
            if ($ticket->messages) {
                foreach ($ticket->messages as $message) {
                    $message->date = Carbon::parse($message->created_at)->toFormattedDateString();
                }
            }
        }

        $ticket_message->date = Carbon::parse($ticket_message->created_at)->toFormattedDateString();

        if ($ticket_message) {
            return response()->json([
                'message' => 'success',
                'data' => [
                    'ticket' => $ticket,
                    'ticket_message' => $ticket_message
                ]
            ]);
        }
    }
}
