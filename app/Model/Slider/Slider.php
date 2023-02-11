<?php

namespace App\Model\Slider;

use App\Traits\HasUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Image\HasImage;

class Slider extends Model
{
    use HasUser, SoftDeletes , HasImage;
    protected $fillable = [
        'creator_id',
        'title',
        'link',
        'description',
        'description2',
        'status'
    ];

    protected $dates = ['deleted_at'];
}
