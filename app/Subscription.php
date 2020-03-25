<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Subscription
 * @package App
 */
class Subscription extends Model
{
    protected $fillable = [
        'name',
        'description'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function points()
    {
        return $this->hasMany(Point::class);
    }
}
