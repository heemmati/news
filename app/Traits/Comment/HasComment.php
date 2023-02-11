<?php


namespace App\Traits\Comment;


use App\Model\Comment\Comment;

trait HasComment
{
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

}
