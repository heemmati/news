<?php


namespace App\Traits;


use App\Model\Permission;
use App\Model\Role;
use Illuminate\Support\Facades\Cache;


const SUPER = 1;
CONST ADMIN = 2;
CONST USER = 3;
CONST SELLER = 4;
CONST MARKETER = 5;

trait HasPermission
{
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_user' );
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'user_permission');
    }

    public function hasRole(... $roles)
    {
        foreach ($roles as $role) {
            if ($this->roles->contains('slug', $role)) {
                return true;
            }
        }
        return false;
    }

    public function hasPermissionTo($permission)
    {

        return $this->hasPermissionThroughRole($permission) || $this->hasPermission($permission);
    }

    protected function hasPermission($permission)
    {
        return (bool)$this->permissions->where('slug', $permission->slug)->count();
    }

    public function hasPermissionThroughRole($permission)
    {
        
        $roles = Cache::remember('rolesss_'.$permission->id , 36000, function () use($permission) {
           return $permission->roles()->get();
        });
        

        foreach ($roles as $role) {
            if ($this->roles->contains($role)) {
                return true;
            }
        }
        return false;
    }

    public function givePermissionsTo(... $permissions)
    {
        $permissions = $this->getAllPermissions($permissions);

        if ($permissions === null) {
            return $this;
        }
        $this->permissions()->saveMany($permissions);
        return $this;
    }

    public function deletePermissions(... $permissions)
    {
        $permissions = $this->getAllPermissions($permissions);
        $this->permissions()->detach($permissions);
        return $this;
    }

    public function getAllPermissions($permissions)
    {
        $permissions = Permission::whereIn('slug', $permissions)->get();
        return $permissions;
    }


 }
