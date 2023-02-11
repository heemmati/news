<?php


namespace App\Repositories\News;


use App\Miracles\Crud;
use App\Model\News\ArticleProducer;

class ArticleProducerRepository extends Crud
{
    public function __construct()
    {
        $this->model = ArticleProducer::class;
    }

    function index()
    {
        // TODO: Implement index() method.
    }

    function create()
    {
        // TODO: Implement create() method.
    }

    function edit($id)
    {
        // TODO: Implement edit() method.
    }
}
