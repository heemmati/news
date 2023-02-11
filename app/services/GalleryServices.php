<?php


namespace App\services;



use App\Traits\ImageUploader;
use Illuminate\Http\Request;

class GalleryServices
{

    use ImageUploader;

    public static function insertImage($object, $src, $user)
    {

        $object->images()->create([
            'title' => $object->title,
            'src' => $src,
            'status' => 1,
            'user_id' => $user,
            'imageable_id' => $object->id,
            'imageable_type ' => get_class($object)
        ]);
    }

    public static function updateArrayImage($object, $srcs, $user)
    {
        if (isset($srcs) && !empty($srcs)) {
            self::deleteAllImages($object);
            self::insertArrayImage($object, $srcs, $user);
        }
        return false;
    }

    public static function updateArrayGallery($object, $file_srcs , $string_src, $user)
    {
        dd($file_srcs , $string_src);

        if (isset($srcs) && !empty($srcs)) {
            self::deleteAllImages($object);
            self::insertArrayImage($object, $srcs, $user);
        }
        return false;
    }



    public static function deleteAllImages($object)
    {
        $deletedItems = $object->images()->delete();
    }

    public static function insertArrayImage($object, $srcs, $user)

    {



        if (isset($srcs) && !empty($srcs)) {
            try {
                foreach ($srcs as $src) {

                    $image_src = self::imageUpload($src);

                    $savedImages = $object->images()->create([
                        'title' => $object->title,
                        'src' => $image_src,
                        'status' => 1,
                        'user_id' => $user,
                        'imageable_id' => $object->id,
                        'imageable_type' => get_class($object)
                    ]);


                }
            } catch (Exception $e) {

                report($e);

                return false;
            }

            return true;
        }

        return false;


    }

    public static function deleteAllArrayImage($object)
    {
        $deletedItems = $object->images()->delete();
    }

    public static function deleteImage($object, $imageId)
    {
        $deletedItems = $object->images()->whereId($imageId);
        dd($deletedItems);
    }

    public static function deleteImageBySrc($object, $imageSrc)
    {
        $deletedItems = $object->images()->whereSrc($imageSrc)->delete();

    }

    public static function imageUpload($item) {



            $image = $item;
            $ext = $image->getClientOriginalExtension();

            $rand = rand(0 , 100);
            $name = time().$rand.'.'.$ext;

            $destinationPath = public_path('/images');

            $item->storeAs('public', $name);
            $image->move($destinationPath, $name);



            return  $name;

        }


}
