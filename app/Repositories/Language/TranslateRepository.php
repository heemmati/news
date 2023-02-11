<?php


namespace App\Repositories\Language;


use App\Miracles\Crud;
use App\Model\Language\Lang;
use App\Model\Language\Translate;
use App\Model\Language\Word;

class TranslateRepository extends Crud
{

    public function __construct()
    {
            $this->model = Translate::class;
    }
    function index()
    {
       $translates = $this->model::latest()->get();
       $breadcrumbs = $this->breadcrumb_generator('translates.index');
       return view('module.language.admin.translate.list' , compact('translates' , 'breadcrumbs'));

    }

    function create()
    {
        $langs = Lang::latest()->get();
        $words = Word::latest()->get();
        $breadcrumbs = $this->breadcrumb_generator('translates.create');
        return view('module.language.admin.translate.create' , compact('words', 'langs','breadcrumbs'));
    }

    function edit($id)
    {
        $langs = Lang::latest()->get();
        $words = Word::latest()->get();

        $breadcrumbs = $this->breadcrumb_generator('translates.edit');
        $translate = $this->model::findOrFail($id);
        return view('module.language.admin.translate.edit' , compact('words', 'langs','translate','breadcrumbs'));

    }
}
