<?php

namespace App\Model\News;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ArticleProducer extends Model
{

    use SoftDeletes;
    protected $fillable = [
        'article_id' ,
        'company' ,
        'company_id' ,
        'author' ,
        'author_id' ,
        'reporter' ,
        'reporter_id' ,
        'photographer' ,
        'photographer_id' ,
        'translator' ,
        'translator_id' ,
        'writer' ,
        'writer_id' ,

    ];

    protected $dates = ['deleted_at'];


    public function article()
    {
        return $this->belongsTo(Article::class , 'article_id');
    }
}
