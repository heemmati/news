<?php

namespace App\Model\Position;

use App\Model\Category\Category;
use App\Model\News\Article;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Position extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id', 'title', 'code', 'limit', 'type', 'status'
    ];

    protected $dates = ['deleted_at'];

    public function articles()
    {
        return $this->morphedByMany(Article::class, 'positionable');
    }

    public function categories()
    {
        return $this->morphedByMany(Category::class, 'positionable');
    }

}
