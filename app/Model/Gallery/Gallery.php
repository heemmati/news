<?php

namespace App\Model\Gallery;

use App\Traits\HasTime;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Base\HasBase;
use App\Traits\Image\HasImage;

class Gallery extends Model
{
    use SoftDeletes , HasImage , HasTime , HasBase;
    protected $guarded = [
        'id'
    ];

    protected $dates = ['deleted_at'];

    public function scopeTitle($query, $title)
    {

        if (isset($title) && !empty($title)) {
            return $query->whereHas('base' , function($q) use($title){
                $q->where('title','like' , '%'.$title.'%');
            });
        }

    }

    public function scopeEntitle($query, $entitle)
    {
        if (isset($entitle) && !empty($entitle)) {
            return $query->whereHas('base' , function($q) use($entitle){
                $q->where('entitle','like' , '%'.$entitle.'%');
            });
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
