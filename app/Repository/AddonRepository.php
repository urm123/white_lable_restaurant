<?php


namespace App\Repository;


use App\Addon;

/**
 * Class AddonRepository
 * @package App\Repository
 */
class AddonRepository
{
    /**
     * @return Addon[]|\Illuminate\Database\Eloquent\Collection
     */
    public function all()
    {
        return Addon::all();
    }
}
