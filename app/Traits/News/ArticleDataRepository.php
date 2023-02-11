<?php


namespace App\Traits\News;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Model\News\Article;
use App\Model\News\ArticleData;
use App\Model\News\ArticleDetail;

trait ArticleDataRepository
{

    public function set_article_detail_data(Request $request , $article ): array
    {

        $data = [];

        $data['article_id'] = $article->id;
        $data['view_count'] = 0;
        $data['rate_count'] = 0;
        $data['bookmark_count'] = 0;
        $data['comment_count'] = 0;
        $data['click_count'] = 0;


        return $data;

    }



    public function article_detail_create(array $data): ArticleDetail
    {

        $article_data = ArticleDetail::create([
            'article_id' => $data['article_id'],
            'view_count' => $data['view_count'],
            'rate_count' => $data['rate_count'],
            'bookmark_count' => $data['bookmark_count'],
            'comment_count' => $data['comment_count'],
            'click_count' => $data['click_count'],

        ]);

        if ($article_data instanceof ArticleDetail) {
            return $article_data;
        } else {
            return false;
        }


    }



    public function create_article_detail_via_request(Request $request , $article): ArticleDetail
    {
        $data = $this->set_article_detail_data($request , $article);

        $article_data = $this->article_detail_create($data);

        return $article_data;
    }





}
