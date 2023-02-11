<?php

namespace App\Model\Comment;

use App\Traits\HasTime;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use SoftDeletes , HasTime;
    protected $fillable = [

        'ip',
        'user_id',
        'name',
        'email',
        'mobile',
        'parent_id',
        'commentable_id',
        'commentable_type',
        'body',
        'status'

    ];

    protected $dates = ['deleted_at'];

    public function commentable()
    {
        return $this->morphTo();
    }

    public function children()
    {
        return $this->hasMany(Comment::class , 'parent_id');
    }

    public function parent()
    {
        return $this->belongsTo(Comment::class , 'parent_id');
    }

}
