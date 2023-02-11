<?php


namespace App\Repositories\Language;


use App\Miracles\Crud;
use App\Model\WordGroup;

class WordGroupRepository extends Crud
{

    public function __construct()
    {
        $this->model = WordGroup::class;

    }
    function index()
    {

        $breadcrumbs = $this->breadcrumb_generator('word-groups.index');
        $word_groups = $this->model::latest()->get();
        return view('language::admin.wordgroup.list' , compact('word_groups' , 'breadcrumbs'));

    }

    function create()
    {
        $breadcrumbs = $this->breadcrumb_generator('word-groups.create');
        return view('language::admin.wordgroup.create' , compact('breadcrumbs'));
    }

    function edit($id)
    {
        $breadcrumbs = $this->breadcrumb_generator('word-groups.edit');

        $word_group = $this->model::findOrFail($id);
        return view('language::admin.wordgroup.edit' , compact('word_group','breadcrumbs'));

    }
}
