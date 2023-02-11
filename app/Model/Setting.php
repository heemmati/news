<?php

namespace App\Model;

use App\Traits\HasLub;
use App\Utility\Lang;
use App\Utility\Status;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Setting extends Model
{
    //
    use SoftDeletes , HasLub;
    protected $fillable = [
        'title' ,
        'code' ,
        'value' ,
    ];

    protected $route_name = 'settings';
    protected $listable = [
        'title' => [],
        'code' => [],
            'value' => []

    ];
    protected $formables = [
        'title' => ['1', 'text'],
        'code' => ['1', 'text'],
        'value' => ['1', 'text'],

    ];
    protected $showables = [
        'title' => ['title'],
        'code' => ['title'],
        'value' => ['title'],

    ];

    protected $dates = ['deleted_at'];

}
