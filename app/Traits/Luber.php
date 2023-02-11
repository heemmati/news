<?php


namespace App\Traits;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

trait Luber
{

    protected $banned_owner = [
        'settings' ,
        'comments' ,
        'contacts' ,
        'socials' ,
        'newspapers' ,
        'newsletters' ,

    ];
    public function get_capture($name){
        $get = Request::capture()->get($name);
        return $get;
    }

    public function get_sub_rows($class , $parent_id)
    {
        $parent = $class->getParentables();
        $collection = $class::where($parent, $parent_id)->get();
        return $collection;

    }

    public function get_simple_collection($class)
    {
        $collection = $class::latest()->get();
        return $collection;
    }

    public function get_collection_by_owner($class)
    {
        $collection =  $class::Owner(Auth::id())->latest()->get();
        return $collection;
    }

    public function get_collection_via_owner_not($route_name){

        if ( !in_array($route_name ,$this->banned_owner)) {
            $collection = $this->get_simple_collection($this->class);

        } else {
            $collection = $this->get_simple_collection($this->class);
        }

        return $collection;
    }

    public function get_collection( $class , $route_name , $parent_id){
        if (isset($parent_id) && !empty($parent_id)) {
            $collection = $this->get_sub_rows($class , $parent_id);
        }
        else {
         $collection = $this->get_collection_via_owner_not($route_name);


        }

        return $collection;

    }


    public function get_insertable($inputs)
    {
        if (isset($inputs) && !empty($inputs)) {
            $insertable = true;
        } else {
            $insertable = false;
        }

        return $insertable;


    }


}
