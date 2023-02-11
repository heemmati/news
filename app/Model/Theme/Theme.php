<?php

namespace App\Model\Theme;

use App\Model\Category\Category;
use App\Model\News\Article;
use App\Traits\HasTime;
use App\Traits\HasUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Theme extends Model
{
    use SoftDeletes , HasUser , HasTime ;
    protected $fillable = [
        'id' ,
        'title' ,
        'path'

    ];
    protected $dates = ['deleted_at'];


    public function categories()
    {
        return $this->morphedByMany(Category::class, 'themeable');
    }

}
