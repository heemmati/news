<?php


namespace App\Traits\Tag;


use App\Model\Tag\Tag;

trait HasTag
{
    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }
}
