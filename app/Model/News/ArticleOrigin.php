<?php

namespace App\Model\News;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Base\HasBase;
use App\Traits\Image\HasImage;

class ArticleOrigin extends Model
{

    use SoftDeletes , HasBase , HasImage;
    protected $fillable = ['link'];
    protected $dates = ['deleted_at'];

}
