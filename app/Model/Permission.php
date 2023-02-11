<?php

namespace App\Model;

use App\Traits\HasLub;
use App\Traits\HasUser;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Permission extends Model
{
    //
    use SoftDeletes , HasLub;
    protected $route_name = 'permissions';
    protected $fillable = [
        'name' ,
        'slug' ,
        'status' ,
    ];



    public function roles()
    {
        return $this->belongsToMany(Role::class , 'role_permission');
    }

    public function users()
    {
        return $this->belongsToMany(User::class , 'user_permission');
    }

    protected static function boot()
    {


        static::deleting(function ($permission) {
            $permission->roles()->detach();
            $permission->users()->detach();
        });



        parent::boot();


    }


}
