<?php


namespace App\Traits\File;


trait FileHelper
{


    public function attach_files($object , $file_array)
    {

        if (isset($file_array) && !empty($file_array) && count($file_array) > 0){
            $object->files()->sync($file_array);
        }

    }

}
