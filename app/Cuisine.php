<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Cuisine
 * @package App
 */
class Cuisine extends Model
{
    protected $dates = ['deleted_at'];

    use SoftDeletes;

    protected $fillable = [
        'name',
        'logo'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function restaurants()
    {
        return $this->belongsToMany(Restaurant::class)->withTimestamps();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function restaurantClones()
    {
        return $this->belongsToMany(RestaurantClone::class)->withTimestamps();
    }
}
