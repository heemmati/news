<?php

namespace App\Model\Service;

use App\Traits\HasSlug;
use App\Traits\HasTime;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Base\HasBase;
use App\Traits\File\HasFile;
use App\Traits\Gallery\HasGallery;
use App\Traits\Icon\HasIcon;
use App\Traits\Image\HasImage;
use App\Traits\Podcast\HasPodcast;
use App\Traits\Position\HasPosition;
use App\Traits\Video\HasVideo;

class Service extends Model
{
    use HasBase , SoftDeletes , HasBase , HasPosition, HasTime , HasIcon ,  HasImage , HasGallery , HasPodcast , HasVideo,HasFile;
    protected $fillable = [
        'creator_id',
        'manager_name',
        'internal_phone',
        'parent_id',
        'status',
        'email'
    ];
    protected $dates = ['deleted_at'];



    public function parent()
    {
        return $this->belongsTo(Service::class , 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Service::class , 'parent_id');
    }



}
