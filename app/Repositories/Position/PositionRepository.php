<?php


namespace App\Repositories\Position;


use App\Miracles\Crud;
use App\Model\Position\Position;

class PositionRepository extends Crud
{


    public function __construct()
    {
        $this->model = Position::class;
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



    function destroy($id)
    {
        // TODO: Implement destroy() method.
    }

    public function store_array($object , $array)
    {

        $positions = $object->positions()->sync($array);
        if ($positions) {
            return true;
        } else {
            return false;
        }
    }

}
