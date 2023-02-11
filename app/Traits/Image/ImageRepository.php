<?php


namespace App\Traits\Image;


use App\Traits\ImageUploader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Model\Image\Image;

trait ImageRepository
{

    use ImageUploader;

    public function create_image_via_request(Request $request)
    {
        $src = $this->imageUploadByName($request, 'src');
        if (isset($src) && !empty($src)){
            $data = $this->set_image_data($request, $src);
            $image = $this->image_create($data);

            return $image;
        }
        else{
            return  false;
        }

    }

    public function set_image_data(Request $request, $src): array
    {
        $user_id = Auth::id();
        $data = [];


        $data['user_id'] = $user_id;
        $data['title'] = $request->input('title');

        $data['alt'] = $request->input('alt');
        $data['src'] = $src;


        return $data;

    }


    public function set_image_update_data(Request $request)
    {

        $data = [];


        $data['title'] = $request->input('title');

        $data['alt'] = $request->input('alt');



        return $data;

    }


    public function image_create(array $data): Image
    {


        $image = Image::create([
            'user_id' => $data['user_id'],
            'title' => $data['title'],
            'alt' => $data['alt'],
            'src' => $data['src'],
        ]);

        if ($image instanceof Image) {
            return $image;
        } else {
            return false;
        }


    }

    public function delete_image($id)
    {
        $object = Image::findOrFail($id);
        $image_path =  Storage::url($object->src);
        if (file_exists(public_path($image_path))) {
            if (unlink(public_path($image_path))) {
                if (Storage::delete('public/' . $object->src)) {
                    $object->delete();
                    if ($object->trashed()) {
                        return true;
                    } else {
                        return false;
                    }
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }
        else{
            $object->delete();
            if ($object->trashed()) {
                return true;
            } else {
                return false;
            }
        }




    }


    public function update_image_via_request(Request $request , $id)
    {

            $data = $this->set_image_update_data($request);
            $image = $this->image_update($data , $id);


            return $image;


    }

    public function image_update($data , $id){
        $image = Image::findOrFail($id);

        $image->update([
            'title' => $data['title'] ,
            'alt' => $data['alt']
        ]);
        if ($image->save()){
            return $image;
        }
        else{
            return false;
        }

    }




}
