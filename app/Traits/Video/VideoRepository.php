<?php


namespace App\Traits\Video;


use App\Traits\ImageUploader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Admin\Image\Image;
use App\Model\Podcast\Podcast;
use App\Model\Video\Video;

trait VideoRepository
{

    use ImageUploader;


    public function set_video_data(Request $request , $src , $screen_shot): array
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

    public function video_create(array $data)
    {


        $video = Video::create([
            'user_id' => $data['user_id'],
            'title' => $data['title'],
            'alt' => $data['alt'],
            'src' => $data['src'] ,
            'screenshot' => $data['screenshot'] ,
        ]);

        if ($video instanceof Video) {
            return $video;
        } else {
            return false;
        }


    }

    public function create_video_via_request(Request $request)
    {
        $src = $this->videoUploadByName($request , 'src');
        $screenshot = null;
        if (isset($src) && !empty($src)){
        $data = $this->set_video_data($request , $src , $screenshot);
        $video = $this->video_create($data);

        return $video;
        }
        else{
            return false;
        }
    }

    public function delete_video($id)
    {
        $object = Video::findOrFail($id);
        $video_path =  Storage::url($object->src);

       if (file_exists(public_path($video_path))){
           if(unlink(public_path($video_path))){
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



    public function update_video_via_request(Request $request , $id)
    {

        $data = $this->set_video_update_data($request);
        $video = $this->video_update($data , $id);


        return $video;


    }

    public function video_update($data , $id){
        $video = Video::findOrFail($id);

        $video->update([
            'title' => $data['title'] ,
            'alt' => $data['alt']
        ]);
        if ($video->save()){
            return $video;
        }
        else{
            return false;
        }

    }


    public function set_video_update_data(Request $request)
    {

        $data = [];


        $data['title'] = $request->input('title');
        $data['alt'] = $request->input('alt');



        return $data;

    }


}
