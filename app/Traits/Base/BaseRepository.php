<?php


namespace App\Traits\Base;


use Illuminate\Http\Request;
use App\Model\Base\Base;

trait BaseRepository
{


    public function set_base_data(Request $request , $object_id , $object_class ) : array
    {
        $data = [];

        $data['title'] = $request->input('title');
        $data['entitle'] = $request->input('entitle');
        $data['baseable_id'] = $object_id;
        $data['baseable_type'] = $object_class;
        $data['description'] = $request->input('description');
        $data['body'] = $request->input('body');
        $data['image'] = null;


        return $data;

    }


    public function set_base_data_raw($title ,  $object , $entitle = null , $description =null , $body = null , $image = null ) : array
    {
        $data = [];

        $data['title'] = $title;
        $data['entitle'] = $entitle;
        $data['baseable_id'] = $object->id;
        $data['baseable_type'] = get_class($object);
        $data['description'] = $description;
        $data['body'] = $body;
        $data['image'] = $image;


        return $data;

    }



    public function base_create(array $data): Base
    {

        $base = Base::create([
            'title' => $data['title'],
            'entitle' => $data['entitle'],
            'baseable_id' => $data['baseable_id'],
            'baseable_type' => $data['baseable_type'],
            'description' => $data['description'],
            'body' => $data['body'],
            'image' => $data['image'],

        ]);

        if ($base instanceof Base) {
            return $base;
        } else {
            return false;
        }
    }



    public function base_create_via_request(Request $request  , $object_id , $object_class ) : Base
    {
        $data = $this->set_base_data($request , $object_id , $object_class);
        $base = $this->base_create($data);

        return $base;
    }




    public function base_create_via_raw($title ,  $object , $entitle = null , $description =null , $body = null , $image = null ) : Base
    {
        $data = $this->set_base_data_raw($title , $object ,$entitle   , $description  , $body , $image );
        $base = $this->base_create($data);

        return $base;
    }



}
