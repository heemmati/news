<?php

namespace App\Model\Image;

use App\Traits\HasUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Model\Gallery\Gallery;
use App\Model\News\Article;
use App\Model\Slider\Slider;

class Image extends Model
{
    use SoftDeletes, HasUser;
    protected $fillable = [
        'user_id',
        'title',
        'alt',
        'src',
    ];
    protected $dates = ['deleted_at'];

    public function articles()
    {
        return $this->morphedByMany(Article::class, 'imageable');
    }


    public function galleries()
    {
        return $this->morphedByMany(Gallery::class, 'imageable');
    }


    public function sliders()
    {
        return $this->morphedByMany(Slider::class, 'imageable');
    }


    public function scopeTitle($query, $title)
    {
        if (isset($title) && !empty($title)){
            return $query->where('title', 'like' , '%'.$title.'%');
        }


    }

    public function scopeEntitle($query, $entitle)
    {
        if (isset($entitle) && !empty($entitle)) {
            return $query->where('entitle','like' , '%'.$entitle.'%');
        }
    }

    public function scopeAlt($query, $alt)
    {
        if (isset($alt) && !empty($alt)) {
            return $query->where('alt', 'like' , '%'.$alt.'%');
        }
    }

    public function scopeStart($query, $start)
    {
        if (isset($start) && !empty($start)) {
            return $query->where('created_at', '>=', $start);
        }
    }

    public function scopeEnd($query, $end)
    {
        if (isset($end) && !empty($end)) {
            return $query->where('created_at', '<=', $end);
        }
    }


}
