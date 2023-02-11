<?php


namespace App\services;


class VideServices
{
    public static function insertImage($object, $src, $user)
    {
        $object->video()->create([
            'title' => $object->title,
            'src' => $src,
            'status' => 1,
            'user_id' => $user,
            'imageable_id' => $object->id,
            'imageable_type ' => get_class($object)
        ]);
    }
}
