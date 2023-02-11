<?php

namespace App\Model;

use App\Traits\HasLub;
use App\Utility\Lang;
use App\Utility\Status;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Newspaper extends Model
{
    //
    use SoftDeletes , HasLub;
    protected $fillable = [

        'title',
        'body',
        'status',

    ];
    protected $showables = [
        'email' => ['email'],
        'body' => ['body'],
        'status' => ['status'],
    ];
    protected $route_name = 'newspapers' ;

    protected $listable = [

        'title' => [] ,
        'body'  => [],

        'status' => []

    ];

    protected $formables = [

        'title' => [ '1' , 'text'],

        'body' => [ '1' , 'body'],
        'status'=> [ '0' , 'utility' , \App\Utility\Newspaper::class],
    ];

    protected $dates = ['deleted_at'];

}
