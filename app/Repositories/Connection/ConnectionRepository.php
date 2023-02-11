<?php


namespace App\Repositories\Connection;


use App\Miracles\Crud;
use App\Model\Connection\Connection;

class ConnectionRepository extends Crud
{
    public function __construct()
    {
        $this->model = Connection::class;
    }

    function index()
    {

        $connections = $this->model::latest()->get();
        $breadcrumbs = $this->breadcrumb_generator('connections.index');
        return view('connection::admin.connection.list' , compact('breadcrumbs' , 'connections'));

    }

    function create()
    {

        $connections = $this->model::latest()->get();
        $breadcrumbs = $this->breadcrumb_generator('connections.create');
        return view('connection::admin.connection.create' , compact('breadcrumbs' , 'connections'));


    }

    function edit($id)
    {

        $connection = $this->model::findOrFail($id);
        $connections = $this->model::latest()->get();
        $breadcrumbs = $this->breadcrumb_generator('connections.edit');
        return view('connection::admin.connection.edit' , compact('breadcrumbs' , 'connection' , 'connections'));


    }

    public function store_array($object , $array)
    {

        $connections = $object->connections()->sync($array);
        if ($connections) {
            return true;
        } else {
            return false;
        }
    }

}
