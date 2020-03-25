<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TicketMessage
 * @package App
 */
class TicketMessage extends Model
{

    protected $fillable = [
        'ticket_id',
        'restaurant_id',
        'user_id',
        'message',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
