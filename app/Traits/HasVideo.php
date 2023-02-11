<?php


namespace App\Traits;


use App\Model\Video;

trait HasVideo
{
    public function videos()
    {
        return $this->morphMany(Video::class , 'videoable');
    }
}
