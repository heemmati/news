<?php


namespace App\Traits\Video;


use App\Http\Controllers\Admin\Image\Image;
use App\Model\Video\Video;

trait HasVideo
{
    public function videos()
    {
        return $this->morphToMany(Video::class, 'videoable');
    }


}
