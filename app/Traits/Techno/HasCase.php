<?php


namespace App\Traits\Techno;


use App\Model\Techno\Cases;

trait HasCase
{

    public function cases()
    {
        return $this->morphToMany(Cases::class, 'caseable');
    }



}
