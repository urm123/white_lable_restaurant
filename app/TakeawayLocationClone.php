<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class TakeawayLocationClone
 * @package App
 */
class TakeawayLocationClone extends Model
{
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'restaurant_id',
        'postcode',
        'preparation_time',
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
