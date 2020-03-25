<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Reservation
 * @package App
 */
class Reservation extends Model
{
    protected $fillable = [
        'restaurant_id',
        'user_id',
        'head_count',
        'time',
        'confirmed',
        'phone',
        'email',
        'restaurant_status',
        'requests',
        'site_promotion_id',
        'promotion_id',
        'site_discount',
        'restaurant_discount',
    ];

    protected $casts = ['confirmed' => 'Boolean'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }
}
