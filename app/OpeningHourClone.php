<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class OpeningHourClone
 * @package App
 */
class OpeningHourClone extends Model
{
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'restaurant_id',
        'day',
        'opening_time',
        'closing_time',
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
