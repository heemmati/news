<?php


namespace App\Traits\News;


use Illuminate\Http\Request;
use App\Model\News\ArticleDetail;
use App\Model\News\ArticleProducer;

trait ArticleProducerRepository
{

    public function set_article_producer_data(Request $request , $article ): array
    {


        $data = [];

        $data['article_id'] = $article->id;

        $data['company'] = $request->input('company');
        $data['company_id'] = 1;

        $data['author'] = $request->input('author');
        $data['author_id'] = 1;

        $data['reporter'] = $request->input('reporter');
        $data['reporter_id'] = 1;

        $data['photographer'] = $request->input('photographer');
        $data['photographer_id'] = 1;

        $data['translator'] = $request->input('translator');
        $data['translator_id'] = 1;

        $data['writer'] =$request->input('writer');
        $data['writer_id'] = 1;


        return $data;

    }



    public function article_producer_create(array $data): ArticleProducer
    {

        $article_producer = ArticleProducer::create([

            'article_id'  => $data['article_id'] ,
            'company'  => $data['company'] ,
            'company_id'  => $data['company_id'] ,
            'author'  => $data['author'] ,
            'author_id'   => $data['author_id'],
            'reporter'  => $data['reporter'] ,
            'reporter_id'  => $data['reporter_id'] ,
            'photographer'  => $data['photographer'] ,
            'photographer_id'   => $data['photographer_id'],
            'translator' => $data['translator'] ,
            'translator_id' => $data['translator_id'] ,
            'writer'  => $data['writer'],
            'writer_id'  => $data['writer_id'] ,


        ]);

        if ($article_producer instanceof ArticleProducer) {
            return $article_producer;
        } else {
            return false;
        }


    }



    public function create_article_producer_via_request(Request $request , $article): ArticleProducer
    {
        $data = $this->set_article_producer_data($request , $article);

        $article_data = $this->article_producer_create($data);

        return $article_data;
    }





}
