<?php


namespace App\Traits\Podcast;


use App\Traits\ImageUploader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Admin\Image\Image;
use App\Model\Podcast\Podcast;
use App\Model\Video\Video;

trait PodcastRepository
{

    use ImageUploader;

    public function set_podcast_data(Request $request , $src , $screen_shot): array
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

    public function podcast_create(array $data)
    {


        $podcast = Podcast::create([
            'user_id' => $data['user_id'],
            'title' => $data['title'],
            'alt' => $data['alt'],
            'src' => $data['src'] ,
            'screenshot' => $data['screenshot'] ,
        ]);

        if ($podcast instanceof Podcast) {
            return $podcast;
        } else {
            return false;
        }


    }

    public function create_podcast_via_request(Request $request)
    {
        $src = $this->podcastUploadByName($request , 'src');
        $screenshot = null;
        if (isset($src) && !empty($src)){

            $data = $this->set_podcast_data($request , $src , $screenshot);
            $podcast = $this->podcast_create($data);

            return $podcast;
        }
        else{
            return false;
        }

    }

    public function delete_podcast($id)
    {
        $object = Podcast::findOrFail($id);
        $podcast_path =  Storage::url($object->src);

        if (file_exists(public_path($podcast_path))){
            if(unlink(public_path($podcast_path))){
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





//        Storage::delete( public_path('/uploads/tasks/' . $task->podcast));


    }


    public function update_podcast_via_request(Request $request , $id)
    {

        $data = $this->set_podcast_update_data($request);
        $podcast = $this->podcast_update($data , $id);


        return $podcast;


    }

    public function podcast_update($data , $id){
        $podcast = Podcast::findOrFail($id);

        $podcast->update([
            'title' => $data['title'] ,
            'alt' => $data['alt']
        ]);
        if ($podcast->save()){
            return $podcast;
        }
        else{
            return false;
        }

    }


    public function set_podcast_update_data(Request $request)
    {

        $data = [];


        $data['title'] = $request->input('title');
        $data['alt'] = $request->input('alt');



        return $data;

    }





}
