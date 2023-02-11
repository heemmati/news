<?php

namespace App\Model\Plan;

use App\Model\Role;
use App\User;
use Illuminate\Database\Eloquent\Model;

class UserRolePanel extends Model
{
    protected $fillable = [
        'user_id' ,
        'role_id' ,
        'plan_id' ,
    ];

    public function user(){
        return $this->belongsTo(User::class , 'user_id');
    }
    public function plan(){
        return $this->belongsTo(Plan::class , 'plan_id');
    }
    public function role(){
        return $this->belongsTo(Role::class , 'role_id');
    }
}
