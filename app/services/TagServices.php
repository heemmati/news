<?php


namespace App\services;


use App\Model\Tag;

class TagServices
{


    public static function insertArrayTag($object , $srcs , $user)

    {
        if (isset($src) && !empty($src)) {
            $myArray = explode(',', $srcs);

            foreach ($myArray as $tag) {
                $tag2 = str_replace(' ', '_', $tag);
                $savedTag = Tag::firstOrCreate([
                    'name' => $tag2,
                    'user_id' => $user,
                    'value' => $tag
                ]);


            }
            $tags = Tag::whereIn('value', $myArray)->get()->pluck('id');

            $object->tags()->sync($tags);
        }
        else{
            return false;
        }

    }

    public static function updateArrayTag($object , $srcs , $user){
//        self::deleteAllArrayTag($object);
        self::insertArrayTag($object , $srcs , $user);
    }
    public static function deleteAllArrayTag($object)
    {
        $deletedItems = $object->tags()->delete();
    }


}
