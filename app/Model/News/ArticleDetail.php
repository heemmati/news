<?php

namespace App\Model\News;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ArticleDetail extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'article_id',
        'view_count',
        'rate_count',
        'bookmark_count',
        'comment_count',
        'click_count',

    ];

    protected $dates = ['deleted'];

    public function article()
    {
        return $this->belongsTo(Article::class, 'article_id');
    }
}
