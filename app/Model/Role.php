<?php

namespace App\Model;

use App\Model\News\Article;
use App\Model\Region\Region;
use App\Traits\HasLub;
use App\Traits\HasUser;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Model\Plan\UserRolePlan;

class Role extends Model
{
    //
    use SoftDeletes , HasLub ;


    protected $route_name = 'roles';
    protected $fillable = [
        'name' ,
        'slug' ,
        'status' ,
    ];


    public function permissions()
    {
        return $this->belongsToMany(Permission::class , 'role_permission');
    }

    public function plans(){
        return $this->hasMany(UserRolePlan::class  , 'role_id' );
    }

    public function users()
    {
        return $this->belongsToMany(User::class , 'role_user');
    }

    public function regions()
    {
        return $this->morphedByMany(Region::class, 'roleable');
    }


    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($book){
            $book->users()->detach();
            $book->permissions()->detach();
            $book->plans()->detach();
            $book->regions()->detach();
        });



    }
}
