<?php


namespace App\Traits\Region;


use App\Model\Region\Region;
use App\Model\Role;

trait HasRegion
{

    public function regions()
    {
        return $this->morphToMany(Region::class, 'regionable');
    }

}
