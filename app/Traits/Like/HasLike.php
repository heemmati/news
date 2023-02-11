<?php


namespace App\Traits\Like;


use App\Model\Like\like;

trait HasLike
{
    public function likes()
    {
        return $this->morphMany(like::class, 'likeable');
    }
}

