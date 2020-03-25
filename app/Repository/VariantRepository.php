<?php


namespace App\Repository;


use App\Variant;

/**
 * Class VariantRepository
 * @package App\Repository
 */
class VariantRepository
{
    /**
     * @return Variant[]|\Illuminate\Database\Eloquent\Collection
     */
    public function all()
    {
        return Variant::all();
    }
}
