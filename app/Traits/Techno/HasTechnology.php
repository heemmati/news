<?php


namespace App\Traits\Techno;


use App\Model\Techno\Technology;

trait HasTechnology
{

    public function technologies()
    {
        return $this->morphToMany(Technology::class, 'technologieable');
    }

}
