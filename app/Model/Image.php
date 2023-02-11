<?php

namespace App\Model;

use App\Traits\HasLub;
use App\Traits\HasUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Image extends Model
{
    //
    use SoftDeletes , HasUser , HasLub;
    protected $fillable = [
        'title' ,
        'src',
        'status'  ,
        'user_id' ,
        'imageable_id' ,
        'imageable_type'
    ];

    public function imageable(){
        return $this->morphTo();
    }

    protected $route_name = 'images' ;
    protected $listable = [
        'src' => ['image'],
    ];
    protected $formables = [
        'src' => ['1' , 'gallery'] ,

    ];
    protected $dates = ['deleted_at'];
}
