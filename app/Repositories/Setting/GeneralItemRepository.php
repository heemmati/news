<?php


namespace App\Repositories\Setting;


use App\Miracles\Crud;
use App\Model\Setting\General;
use App\Model\Setting\GeneralItem;
use App\Utility\Setting\GeneralType;

class GeneralItemRepository extends Crud
{
    public function __construct()
    {
        $this->model = GeneralItem::class;
    }
    function index()
    {
        $items = $this->model::latest()->get();
        $breadcrumbs = $this->breadcrumb_generator('general-items.index');
        return view('module.setting.admin.generalitem.list', compact('items', 'breadcrumbs'));
    }

    function create()
    {
        $breadcrumbs = $this->breadcrumb_generator('general-items.create');
        $generals = General::latest()->get();

        return view('module.setting.admin.generalitem.create' , compact('breadcrumbs' , 'generals'));
    }

    function edit($id)
    {
        $general_item = GeneralItem::findOrFail($id);
        $breadcrumbs = $this->breadcrumb_generator('general-items.edit');
        $generals = General::latest()->get();
        $input = GeneralType::get_input($general_item->type);

        return view('module.setting.admin.generalitem.edit' , compact('breadcrumbs' , 'input','generals' , 'general_item'));


    }
}
