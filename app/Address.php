<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Address
 * @package App
 */
class Address extends Model
{

    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'address',
        'street',
        'city',
        'county',
        'postcode',
        'default',
    ];

    protected $casts = ['default' => 'boolean'];

    protected $dates = ['deleted_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
