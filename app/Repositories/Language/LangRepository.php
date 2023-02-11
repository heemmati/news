<?php


namespace App\Repositories\Language;


use App\Miracles\Crud;
use App\Model\Language\Lang;

class LangRepository extends Crud
{

    public function __construct()
    {
        $this->model = Lang::class;
    }

    function index()
    {
       $breadcrumbs = $this->breadcrumb_generator('langs.create');
       $langs = $this->model::latest()->get();
       return view('language::admin.lang.list' , compact('langs' , 'breadcrumbs'));
    }

    function create()
    {
        $breadcrumbs = $this->breadcrumb_generator('langs.create');
        return view('language::admin.lang.create' , compact('breadcrumbs') );

    }

    function edit($id)
    {
        $breadcrumbs = $this->breadcrumb_generator('langs.edit');
        $lang = $this->model::findOrFail($id);
        return view('language::admin.lang.edit' , compact('lang' , 'breadcrumbs') );
    }
}
