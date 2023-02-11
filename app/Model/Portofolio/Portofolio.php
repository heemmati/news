<?php

namespace App\Model\Portofolio;

use App\Traits\HasTime;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Base\HasBase;
use App\Traits\Category\HasCategory;
use App\Traits\Gallery\HasGallery;
use App\Traits\Image\HasImage;
use App\Traits\Position\HasPosition;
use App\Traits\Tag\HasTag;
use App\Traits\Techno\HasCase;
use App\Traits\Techno\HasTechnology;

class Portofolio extends Model
{
    use SoftDeletes, HasTechnology, HasCase, HasTime, HasBase, HasCategory, HasTag, HasPosition, HasGallery, HasImage;
    protected $fillable = [
        'creator_id',
        'link',
        'length',
        'tablet_image',
        'laptop_image',
        'mobile_image',
        'customer_comment',
        'customer_name',
        'customer_mobile',
        'viewCount',
        'commentCount',
        'likeCount',
        'starCount',
        'workerCount',
        'customer_rate',
        'done_date'
    ];

    protected $dates = ['deleted_at'];


}
