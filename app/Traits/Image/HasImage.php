<?php


namespace App\Traits\Image;


use App\Model\Image\Image;


trait HasImage
{
    public function images()
    {
        return $this->morphToMany(Image::class, 'imageable');
    }

}
