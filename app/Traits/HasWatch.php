<?php


namespace App\Traits;


use App\Model\Watch;

trait HasWatch
{

    public function watches()
    {
        return $this->morphMany(Watch::class, 'watchable');
    }



}
