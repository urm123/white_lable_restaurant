<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class DeliveryLocation
 * @package App
 */
class DeliveryLocation extends Model
{
    protected $dates = ['deleted_at'];

    use SoftDeletes;

    protected $fillable = [
        'restaurant_id',
        'postcode',
        'delivery_time',
        'delivery_cost',
        'minimum_total',
        'free_delivery',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }
}
