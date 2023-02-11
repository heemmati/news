<?php


namespace App\Traits\Icon;


use App\Model\Icon\Icon;

trait HasIcon
{
    public function icons()
    {
        return $this->morphToMany(Icon::class, 'iconable');
    }
}
