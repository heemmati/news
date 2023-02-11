<?php

namespace App\Model;

use App\Traits\HasUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LegalPerson extends Model
{
    //
    use HasUser , SoftDeletes;
    protected $fillable=[
        'user_id' ,
        'register_number' ,
        'equity_type' ,
        'melli_code' ,
        'manager_name' ,
        'newspaper' ,
        'statute' ,
        'certificate' ,
        'status' ,
    ];

    protected $dates = ['deleted_at'];
}
