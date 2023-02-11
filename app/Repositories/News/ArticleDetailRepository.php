<?php


namespace App\Repositories\News;


use App\Miracles\Crud;
use App\Model\News\ArticleDetail;

class ArticleDetailRepository extends Crud
{

    public function __construct()
    {
        $this->model = ArticleDetail::class;
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
