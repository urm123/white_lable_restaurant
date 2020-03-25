<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Variant
 * @package App
 */
class Variant extends Model
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
        return $this->belongsToMany(MenuItem::class)->using(MenuItemVariant::class)->withPivot('price');
    }
}
