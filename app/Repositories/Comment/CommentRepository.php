<?php


namespace App\Repositories\Comment;


use App\Miracles\Crud;
use App\Model\Comment\Comment;

class CommentRepository extends Crud
{

    public function __construct()
    {
        $this->model = Comment::class;
    }

    public function index()
    {
       $comments = $this->model::latest()->get();
       $breadcrumbs = $this->breadcrumb_generator('comments.index');
       return view('module.comment.admin.comment.list' , compact('breadcrumbs' , 'comments'));

    }

    function create()
    {

        $breadcrumbs = $this->breadcrumb_generator('comments.create');
        return view('module.comment.admin.comment.create' , compact('breadcrumbs'));
    }

    function edit($id)
    {
        $breadcrumbs = $this->breadcrumb_generator('comments.edit');
        $comment = $this->model::findOrFail($id);
        return view('module.comment.admin.comment.edit' , compact('breadcrumbs' , 'comment'));
    }
}
