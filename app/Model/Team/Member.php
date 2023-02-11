<?php

namespace App\Model\Team;

use App\Traits\HasUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Member extends Model
{
    use SoftDeletes, HasUser;
    protected $fillable = [
        'team_id',
        'user_id',
        'name',
        'post',
        'email',
        'mobile',
        'history',
        'description',
        'status',
    ];

    protected $dates = ['deleted_at'];
}
