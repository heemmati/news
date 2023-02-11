<?php


namespace App\Repositories\Advertisment;


use App\Miracles\Crud;
use App\Model\Advertisment\AdvertismentType;

class AdvertismentTypeRepository extends Crud
{

    public function __construct()
    {
        $this->model = AdvertismentType::class;
    }
    function index()
    {
        $types = $this->model::latest()->get();
        $breadcrumbs = $this->breadcrumb_generator('advertisement-types.index');
        return view('module.advertisment.admin.type.list' , compact('breadcrumbs' , 'types'));

    }

    function create()
    {

        $breadcrumbs = $this->breadcrumb_generator('advertisement-types.create');
        return view('module.advertisment.admin.type.create' , compact('breadcrumbs'));

    }

    function edit($id)
    {
        $breadcrumbs = $this->breadcrumb_generator('advertisement-types.create');
        $type = $this->model::findOrFail($id);
        return view('module.advertisment.admin.type.edit' , compact('breadcrumbs' , 'type'));
    }
}
