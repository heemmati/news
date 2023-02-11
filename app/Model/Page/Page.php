<?php

namespace App\Model\Page;

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

class Page extends Model
{
    use SoftDeletes , HasBase , HasTag , HasImage , HasPodcast , HasTime , HasFile , HasVideo , HasGallery , HasPosition;

    protected $fillable = [
        'creator_id' ,
        'status' ,
    ];

    protected $dates = ['deleted_at'];
}
