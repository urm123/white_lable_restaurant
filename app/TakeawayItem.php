<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TakeawayItem
 * @package App
 */
class TakeawayItem extends Model
{
    protected $fillable = [
        'takeaway_id',
        'menu_item_id',
        'quantity',
        'menu_item_variant_id'
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function takeaway()
    {
        return $this->belongsTo(Takeaway::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function menuItem()
    {
        return $this->belongsTo(MenuItem::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function addonMenuItems()
    {
        return $this->belongsToMany(AddonMenuItem::class, 'addon_menu_item_takeaway_item', 'takeaway_item_id', 'addon_menu_item_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function menuItemVariants()
    {
        return $this->belongsTo(MenuItemVariant::class, 'menu_item_variant_id');
    }
}
