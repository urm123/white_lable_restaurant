<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TakeawayItemAddon
 * @package App
 */
class TakeawayItemAddon extends Model
{
    protected $fillable = ['addon_id', 'takeaway_item_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function takeawayItem()
    {
        return $this->belongsTo(TakeawayItem::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function addon()
    {
        return $this->belongsTo(Addon::class);
    }
}
