<?php


namespace App\Traits;


use App\Model\Tag;

trait HasTag
{

    public function tags()
    {
        return $this->morphToMany(Tag::class , 'taggable');
    }
}
