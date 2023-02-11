<?php


namespace App\Traits\Icon;

use App\Traits\ImageUploader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Model\Icon\Icon;
use App\Model\Podcast\Podcast;

trait IconRepository
{

    public function set_icon_data(Request $request): array
    {
        $user_id = Auth::id();
        $data = [];

        $data['user_id'] = $user_id;
        $data['title'] = $request->input('title');
        $data['src'] = $request->input('src');
             return $data;

    }

    public function icon_create(array $data)
    {


        $icon = Icon::create([
            'user_id' => $data['user_id'],
            'title' => $data['title'],
            'src' => $data['src'] ,
        ]);

        if ($icon instanceof Icon) {
            return $icon;
        } else {
            return false;
        }


    }

    public function create_icon_via_request(Request $request)
    {


            $data = $this->set_icon_data($request);
            $icon = $this->icon_create($data);

            return $icon;


    }

    public function delete_icon($id)
    {
        $object = Icon::findOrFail($id);

        $object->delete();
        if ($object->trashed()) {
            return true;
        } else {
            return false;
        }

    }


    public function update_icon_via_request(Request $request , $id)
    {

        $data = $this->set_icon_update_data($request);
        $icon = $this->icon_update($data , $id);


        return $icon;


    }

    public function icon_update($data , $id){
        $icon = Icon::findOrFail($id);

        $icon->update([
            'title' => $data['title'] ,
            'src' => $data['src']
        ]);
        if ($icon->save()){
            return $icon;
        }
        else{
            return false;
        }

    }


    public function set_icon_update_data(Request $request)
    {

        $data = [];


        $data['title'] = $request->input('title');
        $data['src'] = $request->input('src');



        return $data;

    }

}
