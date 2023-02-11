<?php


namespace App\Traits\Image;


use App\Http\Controllers\Admin\Image\Image;

trait ImageHelper
{


    public function attach_images($object , $image_array)
    {

        if (isset($image_array) && !empty($image_array) && count($image_array) > 0){
            $object->images()->sync($image_array);
        }


    }






    public function save_src($object , $column , $image_id)
    {
        $image = Image::findOrFail($image_id);
        if (isset($object) && !empty($object) && !empty($column) && isset($column)){

            if (isset($image) && !empty($image)){
                $object->update([
                    $column => $image->src
                ]);

                $object->save();
            }

        }


    }

}
