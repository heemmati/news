<?php


namespace App\Traits\Gallery;


use App\Model\Gallery\Gallery;

trait HasGallery
{
    public function galleries()
    {
        return $this->morphToMany(Gallery::class, 'galleriable');
    }
}
