<?php


namespace App\Traits\Gallery;


trait GalleryHelper
{

    public function attach_galleries($object , $gallery_array)
    {

        if (isset($gallery_array) && !empty($gallery_array) && count($gallery_array) > 0){
            $object->galleries()->sync($gallery_array);
        }

    }


}
