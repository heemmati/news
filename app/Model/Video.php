<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Video extends Model
{
    //
    use SoftDeletes;
    protected $fillable = [
        'title' ,
        'src',
        'status'  ,
        'user_id' ,
        'videoable_id' ,
        'videoable_type'
    ];
    protected $dates = ['deleted_at'];



    public function videoable(){
        return $this->morphTo();
    }
}
