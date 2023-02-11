<?php

namespace App\Model;

use App\Traits\HasLub;
use App\Traits\HasSlug;
use App\Traits\HasUser;
use App\Utility\Lang;
use App\Utility\Status;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model
{
    //
    use HasUser , HasSlug , SoftDeletes , HasLub;
    protected $fillable = [
        'user_id' ,
        'title' ,
        'slug' ,
        'lang' ,
        'body' ,
        'image',
        'status'
    ];


    protected $route_name = 'pages' ;
    protected $listable = [
        'title' => [],
        'slug' => [],
        'lang' => [],
        'image'=> [],
        'status'=> []

    ];
    protected $formables = [
        'title' => ['1' , 'text'] ,
        'body' => ['1' , 'body'] ,
        'lang' => ['1' , 'utility' , Lang::class] ,
        'image' => ['1' , 'image'] ,

        'status'=> [ '0' , 'utility' , Status::class],
    ];


    protected $showables = [
        'title' => ['title'],
        'lang' => ['utility', Lang::class],
        'body' => ['1' , 'body'] ,
        'image' => ['image'],
        'status' => ['status']

    ];


    protected $dates = ['deleted_at'];


    public function path(){
        return  config('app.locale') ."/page/$this->slug";
    }

}
