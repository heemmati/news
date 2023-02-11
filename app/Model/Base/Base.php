<?php

namespace App\Model\Base;

use App\Traits\HasSlug;
use Illuminate\Database\Eloquent\Model;

class Base extends Model
{
    use HasSlug;
    protected $fillable = [
        'title' ,
        'entitle' ,
        'slug' ,
        'description' ,
        'baseable_id' ,
        'baseable_type' ,
        'short' ,
        'body' ,
        'image'
    ];


    public function baseable()
    {
        return $this->morphTo();
    }


}
