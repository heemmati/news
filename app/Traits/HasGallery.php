<?php


namespace App\Traits;


use App\Http\Controllers\Admin\Image;

trait HasGallery
{
    public function images()
    {
        return $this->morphMany(Image::class , 'imageable');
    }
}
