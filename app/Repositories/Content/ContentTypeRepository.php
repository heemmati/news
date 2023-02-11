<?php

namespace App\Repositories\Content;


use App\Miracles\Crud;
use App\Model\ContentManagement\ContentType;

class ContentTypeRepository extends Crud
{

    public function __construct()
    {
        $this->model = ContentType::class;
    }

    function index()
    {

        $types = $this->model::latest()->get();
        $breadcrumbs = $this->breadcrumb_generator('content-types.index');
        return view('module.contentmanagement.admin.type.list', compact('breadcrumbs', 'types'));

    }

    function create()
    {

        $breadcrumbs = $this->breadcrumb_generator('content-types.create');
        return view('module.contentmanagement.admin.type.create', compact('breadcrumbs'));

    }

    function edit($id)
    {
        $breadcrumbs = $this->breadcrumb_generator('content-types.edit');

        $type = $this->model::findOrFail($id);
        return view('module.contentmanagement.admin.type.edit', compact('breadcrumbs', 'type'));
    }
}
