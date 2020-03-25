<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Ticket
 * @package App
 */
class Ticket extends Model
{
    protected $fillable = [
        'delivery_id',
        'takeaway_id',
        'user_id',
        'message',
        'resolved',
    ];

    protected $casts = [
        'resolved' => 'boolean'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function delivery()
    {
        return $this->belongsTo(Delivery::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function takeaway()
    {
        return $this->belongsTo(Takeaway::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ticketMessages()
    {
        return $this->hasMany(TicketMessage::class);
    }
}
