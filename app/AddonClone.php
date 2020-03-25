<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class AddonClone
 * @package App
 */
class AddonClone extends Model
{
    protected $fillable = [
        'menu_item_id',
        'name',
        'price',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function menuItem()
    {
        return $this->hasMany(MenuItem::class);
    }
}
