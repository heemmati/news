<?php

namespace App\Model\User;

use App\Traits\HasUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserDetail extends Model
{
    use SoftDeletes, HasUser;
    protected $fillable = [

        'user_id', 'melli_code', 'phone', 'address', 'type', 'mood', 'bio', 'birth_date', 'following', 'follower'

    ];
    protected $dates = ['deleted_at'];


}
