<?php


namespace App\Repository;


use App\Miracles\Crud;
use App\Model\Role;
use App\User;

class UserRepository extends Crud
{

    public function __construct()
    {
        $this->model = User::class;
    }

    function index()
    {
        $users = $this->model::latest()->get();
        return view('admin.ACL.User.list', compact('users'));
    }

    function create()
    {
        $roles = Role::latest()->get();
        return view('admin.ACL.User.create' , compact('roles'));
    }

    function edit($id)
    {
        $user = $this->model::findorFail($id);
        return view('admin.ACL.User.edit', compact('user'));

    }
}
