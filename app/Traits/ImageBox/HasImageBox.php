<?php


namespace App\Traits\ImageBox;


use App\Model\ImageBox\ImageBox;

trait HasImageBox
{

    public function images()
    {
        return $this->morphMany(ImageBox::class, 'image_boxable');
    }


}
