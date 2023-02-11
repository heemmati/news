<?php


namespace App\services;


use App\Model\Permission;

class Acl
{

    public function permissionsViaRole($user){
        $permissions = [];
        foreach ($user->roles as $role){
            foreach ($role->permissions as $permission){
                array_push($permissions , $permission);
            }
        }
        return $permissions;
    }
    public function permissionsByIdViaRole($user){
        $permissions = [];
        foreach ($user->roles as $role){
            foreach ($role->permissions as $permission){
                array_push($permissions , $permission->id);
            }
        }
        return $permissions;
    }
    public function permissionsViaDirect($user)
    {
        $permissions = [];
        foreach ($user->permissions as $permission ) {
            array_push($permissions , $permission);
        }
        return $permissions;
    }
    public function permissionsByIdViaDirect($user)
    {
        $permissions = [];
        foreach ($user->permissions as $permission ) {
            array_push($permissions , $permission->id);
        }
        return $permissions;
    }
    public function getAllPermissionsByArray()
    {
        $allPermissions = [] ;
        $Permissions = Permission::latest()->get();
        foreach ($Permissions as $permission){
            array_push($allPermissions , $permission);
        }
        return $allPermissions;
    }

    public function permissionsExeceptRoles($user){

        $roledPermissions = $this->permissionsByIdViaRole($user);
        $unroledPermissions = [];
        $all = Permission::latest()->get();

        foreach($all as $item){
            if( !in_array( $item->id ,$roledPermissions )){
                array_push($unroledPermissions , $item);
            }
        }

        return $unroledPermissions;


    }
    public function permissionsViaRoleAndDirect($user)
    {
        $roledPermission = $this->permissionsViaRole($user);
        $directPermission = $this->permissionsViaDirect($user);
        $permissions = array_merge($roledPermission , $directPermission);
        return $permissions;
    }
}
