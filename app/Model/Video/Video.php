<?php

namespace App\Model\Video;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Model\News\Article;

class Video extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'user_id' ,
        'title' ,
        'alt' ,
        'src' ,
        'screenshot' ,
    ];
    protected $dates = ['deleted_at'];


    public function articles()
    {
        return $this->morphedByMany(Video::class, 'videoable');
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
