<?php
/**
 * Created by PhpStorm.
 * User: janaka
 * Date: 11/03/19
 * Time: 6:02 PM
 */

namespace App\Repository;


use App\Ticket;
use App\TicketMessage;

/**
 * Class TicketRepository
 * @package App\Repository
 */
class TicketRepository
{
    /**
     * @param array $request
     * @return TicketMessage
     */
    public function createMessage(array $request)
    {
        $ticket_message = new TicketMessage($request);
        $ticket_message->save();
        return $ticket_message;
    }

    /**
     * @param int $ticket_id
     * @param bool $resolved
     * @return mixed
     */
    public function updateResolved(int $ticket_id, bool $resolved)
    {
        return Ticket::where('id', '=', $ticket_id)->update(['resolved' => $resolved]);
    }

    /**
     * @param array $request
     * @return Ticket
     */
    public function createTicket(array $request)
    {
        $ticket = new Ticket($request);
        $ticket->save();
        return $ticket;
    }
}