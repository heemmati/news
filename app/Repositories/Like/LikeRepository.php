<?php


namespace App\Repositories\Like;


use App\Miracles\Crud;
use App\Model\Like\Like;

class LikeRepository extends Crud
{

    public function __construct()
    {
        $this->model = like::class;
    }

    public function index()
    {
        $likes = $this->model::latest()->get();
        $breadcrumbs = $this->breadcrumb_generator('likes.index');
        return view('module.like.admin.like.list' , compact('breadcrumbs' , 'likes'));

    }

    function create()
    {

        $breadcrumbs = $this->breadcrumb_generator('likes.create');
        return view('module.like.admin.like.create' , compact('breadcrumbs'));
    }

    function edit($id)
    {
        $breadcrumbs = $this->breadcrumb_generator('likes.edit');
        $like = $this->model::findOrFail($id);
        return view('module.like.admin.like.edit' , compact('breadcrumbs' , 'like'));
    }
}
