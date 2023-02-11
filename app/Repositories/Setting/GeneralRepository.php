<?php


namespace App\Repositories\Setting;


use App\Miracles\Crud;
use App\Model\Setting\General;

class GeneralRepository extends Crud
{

    public function __construct()
    {
        $this->model = General::class;
    }

    function index()
    {
        $generals = $this->model::latest()->get();
        $breadcrumbs = $this->breadcrumb_generator('generals.index');
        return view('module.setting.admin.general.list', compact('generals', 'breadcrumbs'));
    }

    function create()
    {
        $breadcrumbs = $this->breadcrumb_generator('generals.create');
        return view('module.setting.admin.general.create' , compact('breadcrumbs'));
    }

    function edit($id)
    {
        $general = General::findOrFail($id);
        $breadcrumbs = $this->breadcrumb_generator('generals.edit');
        return view('module.setting.admin.general.edit', compact('breadcrumbs' , 'general'));
    }
}
