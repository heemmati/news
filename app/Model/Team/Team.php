<?php

namespace App\Model\Team;

use App\Traits\HasUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Base\HasBase;
use App\Traits\File\HasFile;
use App\Traits\Image\HasImage;
use App\Traits\Tag\HasTag;
use App\Traits\Video\HasVideo;

class Team extends Model
{
    use SoftDeletes, HasUser, HasBase, HasTag, HasImage, HasVideo, HasFile;
    protected $fillable = [
        'creator_id',
        'status',
    ];
    protected $dates = ['deleted_at'];
}
