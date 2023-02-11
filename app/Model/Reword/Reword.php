<?php

namespace App\Model\Reword;

use App\Traits\HasTime;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Base\HasBase;
use App\Traits\File\HasFile;
use App\Traits\Gallery\HasGallery;
use App\Traits\Image\HasImage;
use App\Traits\Podcast\HasPodcast;
use App\Traits\Position\HasPosition;
use App\Traits\Tag\HasTag;
use App\Traits\Video\HasVideo;

class Reword extends Model
{


    protected $fillable = [
        'id' ,
        'word' ,
         'trans'
    
    ];
 protected $dates = ['created_at' , 'updated_at'];

}
