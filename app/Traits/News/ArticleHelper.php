<?php


namespace App\Traits\News;


use App\Model\News\Article;

trait ArticleHelper
{

    public function get_all_article()
    {
        $articles = Article::latest()->get();
        return $articles;
    }
}
