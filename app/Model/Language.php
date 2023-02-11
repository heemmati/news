<?php

namespace App\Model;

use App\Traits\HasLub;
use App\Traits\HasUser;
use App\Utility\Status;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Language extends Model
{
    //
    use HasUser , SoftDeletes , HasLub;
    protected $fillable = [
        'user_id' ,
        'word' ,
        'persian' ,
        'english' ,
        'status'

    ];
    protected $showables = [

        'word' => ['title'],

        'persian' => ['title'],
        'english' => ['title'],
        'status' => ['status']


    ];


    protected $route_name = 'languages' ;
    protected $listable = [
        'word' => [] ,
        'persian'  => [],
        'english' => [],
        'status' => []


    ];
    protected $formables = [
        'word' => ['1' , 'text'] ,
        'persian' => ['1' , 'text'] ,
        'english' => ['1' , 'text'] ,
        'status'=> [ '0' , 'utility' , Status::class],

    ];

    protected $dates = ['deleted_at'];
}
