<?php

namespace App\Model\Icon;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Icon extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'user_id', 'title', 'src'
    ];
    protected $dates = ['deleted_at'];


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

    public function scopeSrc($query, $src)
    {
        if (isset($src) && !empty($src)) {
            return $query->where('src', 'like' , '%'.$src.'%');
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
