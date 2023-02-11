<?php


namespace App\Repositories\News;


use App\Miracles\Crud;
use App\Model\News\ArticleType;

class ArticleTypeRepository extends Crud
{

    public function __construct()
    {
        $this->model = ArticleType::class;
    }
    function index()
    {
        $types = $this->model::latest()->get();
        $breadcrumbs = $this->breadcrumb_generator('article-types.index');
        return view('module.news.admin.type.list', compact('types' , 'breadcrumbs'));
    }

    public function create()
    {
        $breadcrumbs = $this->breadcrumb_generator('article-types.create');
        return view('module.news.admin.type.create' , compact('breadcrumbs'));
    }

    function edit($id)
    {
        $breadcrumbs = $this->breadcrumb_generator('article-types.edit');
        $type = $this->model::findOrFail($id);
        return view('module.news.admin.type.edit' , compact('breadcrumbs' , 'type'));
    }

}
