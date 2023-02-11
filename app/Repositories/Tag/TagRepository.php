<?php


namespace App\Repositories\Tag;


use App\Miracles\Crud;
use App\Model\Tag\Tag;

class TagRepository extends Crud
{
    public function __construct()
    {

        $this->model = Tag::class;

    }

    public function index()
    {


      $tags = $this->model::orderBy('view' , 'DESC')->paginate(20);

      $breadcrumbs = $this->breadcrumb_generator('tags.index');
      return view('module.tag.admin.tag.list' , compact('breadcrumbs' , 'tags'));
    }

    function create()
    {
        // TODO: Implement create() method.
    }

    function edit($id)
    {
        $tag = $this->model::findOrFail($id);

        $breadcrumbs = $this->breadcrumb_generator('tags.edit');
        return view('module.tag.admin.tag.edit' , compact('breadcrumbs' , 'tag'));
    }
}
