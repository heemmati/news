<?php


namespace App\Repositories\News;


use App\Miracles\Crud;
use App\Model\News\ArticleOrigin;

class ArticleOriginRepository extends Crud
{

    public function __construct()
    {
        $this->model = ArticleOrigin::class;
    }

    function index()
    {
        $origins =  $this->model::latest()->get();
        $breadcrumbs = $this->breadcrumb_generator('article-origins.index');
        return view('module.news.admin.origin.list', compact('origins' , 'breadcrumbs'));

    }

    function create()
    {

        $breadcrumbs = $this->breadcrumb_generator('article-origins.create');
        return view('module.news.admin.origin.create', compact('breadcrumbs'));

    }

    function edit($id)
    {
        $origin = $this->model::findOrFail($id);
        $breadcrumbs = $this->breadcrumb_generator('article-origins.create');
        return view('module.news.admin.origin.edit', compact('origin' , 'breadcrumbs'));
    }
}
