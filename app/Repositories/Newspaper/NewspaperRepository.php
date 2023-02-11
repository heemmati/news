<?php


namespace App\Repositories\Newspaper;


use App\Miracles\Crud;
use App\Model\Newspaper\Newspaper;
use App\Model\Newspaper\NewspaperType;

class NewspaperRepository extends Crud
{

    public function __construct()
    {
        $this->model = Newspaper::class;
    }

    function index()
    {

        $newspapers = $this->model::latest()->get();
        $breadcrumbs = $this->breadcrumb_generator('newspapers.index');
        return view('module.newspaper.admin.newspaper.list' , compact('breadcrumbs' , 'newspapers'));

    }

    function create()
    {
        $types = NewspaperType::latest()->get();
        $breadcrumbs = $this->breadcrumb_generator('newspapers.create');
        return view('module.newspaper.admin.newspaper.create' , compact('breadcrumbs' , 'types'));

    }

    function edit($id)
    {
        $types = NewspaperType::latest()->get();
        $breadcrumbs = $this->breadcrumb_generator('newspapers.edit');
        $newspaper = $this->model::findOrFail($id);
        return view('module.newspaper.admin.newspaper.edit' , compact('breadcrumbs' , 'newspaper', 'types'));

    }
}
