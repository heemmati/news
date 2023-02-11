<?php


namespace App\Traits\Icon;

trait IconHelper
{
    public function attach_icons($object , $icon_array)
    {

        if (isset($icon_array) && !empty($icon_array) && count($icon_array) > 0){

            $object->icons()->sync($icon_array);
        }

    }
}
