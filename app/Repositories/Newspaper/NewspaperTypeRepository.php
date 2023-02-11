<?php


namespace App\Repositories\Newspaper;


use App\Miracles\Crud;
use App\Model\Newspaper\NewspaperType;

class NewspaperTypeRepository extends Crud

{

    public function __construct()
    {
        $this->model = NewspaperType::class;
    }

    function index()
    {
        $types = $this->model::latest()->get();
        $breadcrumbs = $this->breadcrumb_generator('newspaper-types.index');
        return view('newspaper::admin.type.list' , compact('breadcrumbs' , 'types'));

    }

    function create()
    {

        $breadcrumbs = $this->breadcrumb_generator('newspaper-types.create');
        return view('newspaper::admin.type.create' , compact('breadcrumbs'));
    }

    function edit($id)
    {
        $breadcrumbs = $this->breadcrumb_generator('newspaper-types.edit');
        $type = $this->model::findOrFail($id);
        return view('newspaper::admin.type.edit' , compact('breadcrumbs' ,'type'));
    }
}
