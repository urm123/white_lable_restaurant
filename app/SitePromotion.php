<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class SitePromotion
 * @package App
 */
class SitePromotion extends Model
{
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'promocode',
        'type',
        'value',
        'start_date',
        'expiry_date',
        'limit',
    ];

    use SoftDeletes;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function deliveries()
    {
        return $this->hasMany(Delivery::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function takeaways()
    {
        return $this->hasMany(Takeaway::class);
    }
}
