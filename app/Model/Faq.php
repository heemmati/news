<?php

namespace App\Model;

use App\Traits\HasLub;

use App\Traits\HasUser;
use App\Utility\Lang;
use App\Utility\Status;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Faq extends Model
{
    //
    use HasUser , SoftDeletes , HasLub;
    protected $fillable = [
        'user_id' ,
        'question' ,
        'answer' ,

        'lang' ,

        'image',
        'status'
    ];


    protected $route_name = 'faqs' ;
    protected $listable = [
        'question' => [] ,
        'answer'  => [],
        'image' => [],
        'status' => []

    ];
    protected $formables = [
        'question' => ['1' , 'text'] ,
        'answer' => ['1' , 'description'] ,
        'lang' => ['1', 'utility', Lang::class],
        'image' => ['1', 'image'],
        'status'=> [ '0' , 'utility' , Status::class],

    ];

    protected $showables = [
        'question' => ['title'],
        'answer' => ['title'],
        'lang' => ['utility', Lang::class],
        'image' => ['image'],
        'status' => ['status']

    ];


    protected $dates = ['deleted_at'];


}
