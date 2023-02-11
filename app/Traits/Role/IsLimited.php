<?php


namespace App\Traits\Role;


use App\Model\Role;

trait IsLimited
{

    public function roles()
    {
        return $this->morphToMany(Role::class, 'roleable');
    }
}
