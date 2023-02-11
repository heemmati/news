<?php


namespace App\Traits\Gallery;


use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use App\Model\Gallery\Gallery;

trait GalleryRepository
{

    public function create_empty_gallery()
    {
        $gallery = Gallery::create([
            'created_at' => Carbon::now()
        ]);

        if ($gallery instanceof Gallery){
            return $gallery;
        }
        else{

            return false;
        }
    }

    public function delete_gallery($id)
    {
        $object = Gallery::findOrFail($id);

        $object->delete();
        if ($object->trashed()){
            return true;
        }
        else{
            return false;
        }

    }
}
