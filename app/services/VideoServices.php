<?php


namespace App\services;


use Illuminate\Http\Request;

class VideoServices
{

    public static function insertVideo($object , $src , $user)
    {


        $file_src = self::fileUpload($src);

        $object->videos()->create([
            'title' => $object->title ,
            'src' => $file_src,
            'status' => 1 ,
            'user_id' => $user,
            'videoable_id' => $object->id,
            'videoable_type ' => get_class($object)
        ]);
    }

    public static function inserVideoName($object , $file_src , $user)
    {


        $object->videos()->create([
            'title' => $object->title ,
            'src' => $file_src,
            'status' => 1 ,
            'user_id' => $user,
            'videoable_id' => $object->id,
            'videoable_type ' => get_class($object)
        ]);
    }

    public static function updateArrayVideoName($object, $src, $user)
    {
        if (isset($src) && !empty($src)) {
            self::deleteAllVideos($object);
            self::inserVideoName($object, $src, $user);
        }
        return false;
    }

    public static function updateArrayVideo($object, $src, $user)
    {
        if (isset($src) && !empty($src)) {
            self::deleteAllVideos($object);
            self::insertVideo($object, $src, $user);
        }
        return false;
    }


    public static function insertArrayVideo($object , $srcs , $user)

    {


        try {
            foreach ($srcs as $src){

                $savedImages =$object->videos()->create([
                    'title' => $object->title ,
                    'src' => $src,
                    'status' => 1 ,
                    'user_id' => $user,
                    'videoable_id' => $object->id,
                    'videoable_type' => get_class($object)
                ]);


            }
        } catch (Exception $e) {

            report($e);

            return false;
        }
        return true;


    }

    public static function deleteAllVideos($object)
    {
        $deletedItems = $object->videos()->delete();
    }

    public static function fileUpload($item) {



        $image = $item;

        $ext = $image->getClientOriginalExtension();


        $rand = rand(0 , 100);

        $name = time().$rand.'.'.$ext;

        $destinationPath = public_path('/files');

        $item->storeAs('public', $name);

        $image->move($destinationPath, $name);



        return  $name;

    }

}
