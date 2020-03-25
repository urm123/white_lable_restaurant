<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DeliveryItemAddon
 * @package App
 */
class DeliveryItemAddon extends Model
{
    protected $fillable = ['addon_id', 'delivery_item_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function deliveryItem()
    {
        return $this->belongsTo(DeliveryItem::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function addon()
    {
        return $this->belongsTo(Addon::class);
    }
}
