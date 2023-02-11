<?php


namespace App\Miracles;


class MainCrud extends Crud
{

    public function index()
    {
        $collection = $this->model::latest()->get();
        return view('admin.auto.list.list' , compact('collection'));
    }

    function create()
    {
        // TODO: Implement create() method.
    }

    function edit($id)
    {
        // TODO: Implement edit() method.
    }
}
