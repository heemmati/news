<?php

namespace App\Model;

use App\Traits\HasLub;
use App\Traits\HasTime;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class  Comment extends Model
{
    //
    use SoftDeletes , HasTime , HasLub;
    protected $fillable=[
        'name' ,
        'user_id' ,
        'email' ,
        'commentable_id' ,
        'commentable_type' ,
        'body' ,
        'status' ,

    ];

    protected $route_name = 'comments' ;
    protected $listable = [
        'name' => [] ,
        'email'  => [],
        'body' =>[],
        'status' => []

    ];

    protected $showables = [

        'name' => ['title'],
        'body' => ['body'],
        'email' => ['email'],
        'status' => ['status']


    ];
    protected $formables = [];



    protected $dates = ['deleted_at'];


    public function commentable()
    {
        return $this->morphTo();

    }


    protected static function boot()
    {
        parent::boot();




    }



}
