<?php


namespace App\Repositories\Base;


use App\Miracles\Crud;
use App\Model\Base\Base;

class BaseRepository extends Crud
{

    public function __construct()
    {
       $this->model = Base::class;
    }


    function index()
    {
        // TODO: Implement index() method.
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
