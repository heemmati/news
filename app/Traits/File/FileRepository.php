<?php


namespace App\Traits\File;


use App\Traits\ImageUploader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Model\File\File;
use App\Model\Podcast\Podcast;
use App\Model\Video\Video;

trait FileRepository
{

    use ImageUploader;


    public function set_file_data(Request $request , $src , $screen_shot): array
    {
        $user_id = Auth::id();
        $data = [];

        $data['user_id'] = $user_id;
        $data['title'] = $request->input('title');
        $data['alt'] = $request->input('alt');
        $data['src'] = $src;
        $data['screenshot'] = $screen_shot;


        return $data;

    }

    public function file_create(array $data)
    {


        $file = File::create([
            'user_id' => $data['user_id'],
            'title' => $data['title'],
            'alt' => $data['alt'],
            'src' => $data['src'] ,
            'screenshot' => $data['screenshot'] ,
        ]);

        if ($file instanceof File) {
            return $file;
        } else {
            return false;
        }


    }

    public function create_file_via_request(Request $request)
    {
        $src = $this->fileUploadByName($request , 'src');
        $screenshot = null;
        if (isset($src) && !empty($src)){
            $data = $this->set_file_data($request , $src , $screenshot);
            $file = $this->file_create($data);

            return $file;
        }
        else{
            return false;
        }

    }

    public function delete_file($id)
    {
        $object = File::findOrFail($id);
        $file_path =  Storage::url($object->src);

        if (file_exists(public_path($file_path))){
            if(unlink(public_path($file_path))){
                if (  Storage::delete( 'public/'.$object->src)){
                    $object->delete();
                    if ($object->trashed()) {
                        return true;
                    } else {
                        return false;
                    }
                }
                else{
                    return false;
                }
            }
            else{
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



    public function update_file_via_request(Request $request , $id)
    {

        $data = $this->set_file_update_data($request);
        $file = $this->file_update($data , $id);


        return $file;


    }

    public function file_update($data , $id){
        $file = File::findOrFail($id);

        $file->update([
            'title' => $data['title'] ,
            'alt' => $data['alt']
        ]);
        if ($file->save()){
            return $file;
        }
        else{
            return false;
        }

    }


    public function set_file_update_data(Request $request)
    {

        $data = [];


        $data['title'] = $request->input('title');
        $data['alt'] = $request->input('alt');



        return $data;

    }



}
