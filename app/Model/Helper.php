<?php

namespace App\Model;

use App\Traits\HasLub;
use App\Traits\HasSlug;
use App\Traits\HasTime;
use App\Traits\HasUser;
use App\Utility\Lang;
use App\Utility\Status;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Helper extends Model
{
    //

    use HasLub ,  HasUser , HasSlug , HasTime , SoftDeletes;
    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'lang',
        'description',
        'body',
        'image',
        'status'
    ];
    protected $route_name = 'helpers';
    protected $listable = [
        'title' => [],
        'slug' => [],
        'image' => [],
        'status' => []

    ];
    protected $formables = [
        'title' => ['1', 'text'],
        'lang' => ['1', 'utility', Lang::class],
        'description' => ['1', 'description'],
        'body' => ['1', 'body'],
        'image' => ['1', 'image'],
        'status'=> [ '0' , 'utility' , Status::class],

    ];
    protected $showables = [
        'title' => ['title'],

        'lang' => ['utility', Lang::class],
        'description' => ['text'],
        'body' => ['body'],
        'image' => ['image'],
        'status' => ['status']
    ];


    public function path()
    {
        return config('app.locale')."/panel/helper/article/$this->slug";
    }

    protected $dates = ['deleted_at'];



}
