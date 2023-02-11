<?php

namespace App\Model\ImageBox;

use Illuminate\Database\Eloquent\Model;

class ImageBox extends Model
{
    protected $fillable = [
        'image_boxable_id', 'image_boxable_type', 'src'
    ];

    public function image_boxable()
    {
        return $this->morphTo();
    }

}
