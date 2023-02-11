<?php


namespace App\Repositories\Language;


use App\Miracles\Crud;
use App\Model\Word;
use App\Model\WordGroup;

class WordRepository extends Crud
{

    public function __construct()
    {
        $this->model = Word::class;
    }
    function index()
    {
        $words = $this->model::latest()->get();
        $breadcrumbs = $this->breadcrumb_generator('words.index');

        return view('language::admin.word.list' , compact('words' , 'breadcrumbs'));
    }

    function create()
    {

        $breadcrumbs = $this->breadcrumb_generator('words.create');
        $word_groups = WordGroup::latest()->get();
        return view('language::admin.word.create' , compact('breadcrumbs' , 'word_groups'));

    }

    function edit($id)
    {
        $breadcrumbs = $this->breadcrumb_generator('words.create');
        $word = $this->model::findOrFail($id);
        $word_groups = WordGroup::latest()->get();
        return view('language::admin.word.edit' , compact('breadcrumbs' , 'word' , 'word_groups'));
    }
}
