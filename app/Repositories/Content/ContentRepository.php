<?php


namespace App\Repositories\Content;


use App\Miracles\Crud;
use App\Model\ContentManagement\Content;

class ContentRepository extends Crud
{

    public function __construct()
    {
        $this->model = Content::class;
    }

    function index()
    {
        $contents = $this->model::latest()->get();
                $breadcrumbs = $this->breadcrumb_generator('contents.index');

        return view('contentmangement::admin.content.list' , compact('breadcrumbs' , 'contents'));

    }

    function create()
    {

        $breadcrumbs = $this->breadcrumb_generator('contents.create');
               return view('contentmangement::admin.content.create' , compact('breadcrumbs' , 'types'));

    }

    function edit($id)
    {
        $breadcrumbs = $this->breadcrumb_generator('contents.edit');

        $content = $this->model::findOrFail($id);
        return view('contentmangement::admin.content.edit' , compact('breadcrumbs' , 'content'));
    }
}
