<?php

namespace App\Miracles;

use App\Traits\Breadcrumb;

abstract class Crud
{
    use Breadcrumb;
    protected $model;

    abstract function index();

    abstract function create();

    public function store($data)
    {

        $payment = $this->model::create($data);
        if ($payment instanceof $this->model) {
            return $payment;
        } else {
            return false;
        }
    }

    abstract function edit($id);

    public function update($id, $data)
    {
        $object = $this->model::findOrFail($id);
        $object->update($data);
        if ($object->save()) {
            return $object;
        } else {
            return false;
        }
    }

    public function destroy($id)
    {
        $object = $this->model::findOrFail($id);
        $object->delete();
        if ($object->trashed()) {
            return true;
        } else {
            return false;
        }
    }

}
