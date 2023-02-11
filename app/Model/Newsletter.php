<?php

namespace App\Model;

use App\Traits\HasLub;
use App\Utility\Lang;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Newsletter extends Model
{
    //
    //
    use SoftDeletes , HasLub;
    protected $fillable = [

        'email',
        'lang',

    ];
    protected $showables = [
        'email' => ['email'],
    ];
    protected $route_name = 'newsletters' ;

    protected $listable = [

        'email' => [] ,

    ];

    protected $formables = [

        'email' => [ '1' , 'email'],
        'lang' => ['1', 'utility', Lang::class],
    ];

    protected $dates = ['deleted_at'];


}
