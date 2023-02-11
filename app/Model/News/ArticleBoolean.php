<?php

namespace App\Model\News;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ArticleBoolean extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'article_id',
        'comments',
        'image_rss',
        'most_comments',
        'most_rated',
        'image',
        'most_viewed',
        'view_count',
        'social',
        'iframe',
        'rss'
    ];

    protected $dates = ['deleted_at'];

    public function article()
    {
        return $this->belongsTo(Article::class , 'article_id');
    }
}
