<?php

namespace App\Http\Controllers\Admin\News;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Studio\CategoryStudio;
use App\Model\News\Article;

class ArticleCategoryController extends CategoryStudio
{
    protected  $model ;

    public function __construct()
    {
        $this->model = Article::class;
    }

}
