<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class PromotionClone
 * @package App
 */
class PromotionClone extends Model
{
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'restaurant_id',
        'promocode',
        'type',
        'value',
        'start_date',
        'expiry_date',
        'limit',
    ];

    use SoftDeletes;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }
}
