<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class DeliveryLocationClone
 * @package App
 */
class DeliveryLocationClone extends Model
{
    protected $fillable = [
        'restaurant_id',
        'postcode',
        'delivery_time',
        'delivery_cost',
        'minimum_total',
        'free_delivery',
    ];

    protected $dates = ['deleted_at'];

    use SoftDeletes;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }
}
