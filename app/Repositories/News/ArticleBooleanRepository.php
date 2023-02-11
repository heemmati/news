<?php


namespace App\Repositories\News;


use App\Miracles\Crud;

class ArticleBooleanRepository extends Crud
{
    public function __construct()
    {
        $this->model = \App\Model\News\ArticleBoolean::class;
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
