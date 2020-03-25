<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Addon
 * @package App
 */
class Addon extends Model
{
    protected $fillable = [
        'menu_item_id',
        'name',
    ];

    protected $dates = ['deleted_at'];

    use SoftDeletes;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function menuItems()
    {
        return $this->belongsToMany(MenuItem::class)->using(AddonMenuItem::class)->withPivot('price');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function deliveryItemAddons()
    {
        return $this->hasMany(DeliveryItemAddon::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function takeawayItemAddons()
    {
        return $this->hasMany(TakeawayItemAddon::class);
    }
}
