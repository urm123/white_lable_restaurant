<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Point
 * @package App
 */
class Point extends Model
{
    protected $fillable = [
        'subscription_id',
        'point',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function subscription()
    {
        return $this->belongsTo(Subscription::class);
    }
}
