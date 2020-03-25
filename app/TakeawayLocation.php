<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class TakeawayLocation
 * @package App
 */
class TakeawayLocation extends Model
{
    protected $dates = ['deleted_at'];

    use SoftDeletes;

    protected $fillable = [
        'restaurant_id',
        'postcode',
        'preparation_time',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }
}
