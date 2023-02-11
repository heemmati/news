<?php

namespace App\Model\Faqs;

use App\Traits\HasTime;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Base\HasBase;
use App\Traits\File\HasFile;
use App\Traits\Gallery\HasGallery;
use App\Traits\Image\HasImage;
use App\Traits\Podcast\HasPodcast;
use App\Traits\Video\HasVideo;

class Faq extends Model
{
    use SoftDeletes , HasBase , HasFile , HasVideo , HasImage , HasGallery , HasPodcast , HasTime;
    protected $fillable = [
        'creator_id'	,
        'status'
    ];

    protected $dates = ['deleted_at'];
}
