<?php
/**
 * Created by PhpStorm.
 * User: janaka
 * Date: 18/03/19
 * Time: 6:21 PM
 */

namespace App\Repository;


use App\Setting;
use App\SitePromotion;

/**
 * Class SitePromotionRepository
 * @package App\Repository
 */
class SitePromotionRepository
{
    /**
     * @return mixed
     */
    public function getSetting()
    {
        return Setting::first();
    }

    /**
     * @return SitePromotion[]|\Illuminate\Database\Eloquent\Collection
     */
    public function get()
    {
        return SitePromotion::all();
    }

    /**
     * @param int $promotion_id
     * @return mixed
     */
    public function getSitePromotion(int $promotion_id)
    {
        return SitePromotion::whereId($promotion_id)->first();
    }

    /**
     * @param array $promotion
     * @return SitePromotion
     */
    public function create(array $promotion)
    {
        $site_promotion = new SitePromotion($promotion);
        $site_promotion->save();
        return $site_promotion;
    }

    /**
     * @param string $promocode
     * @return mixed
     */
    public function getByPromocode(string $promocode)
    {
        return SitePromotion::where('promocode', '=', $promocode)->get();
    }

    /**
     * @param string $today
     * @return mixed
     */
    public function current(string $today)
    {
        return SitePromotion::where('expiry_date', '>=', $today)
            ->where('start_date', '<=', $today)
            ->get();
    }
}
