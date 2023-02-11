<?php

namespace App\Model;

use App\Traits\HasUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RealPerson extends Model
{
    use HasUser , SoftDeletes;
    //
    protected $fillable = [
        'user_id' ,
        'melli_code' ,
        'melli_card' ,
        'personal' ,
        'heir_name' ,
        'heir_melli_code' ,
    ];

    protected $dates = ['deleted_at'];
}
