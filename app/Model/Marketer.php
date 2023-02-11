<?php

namespace App\Model;

use App\Traits\HasUser;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Marketer extends Model
{
    //

    protected $fillable = [
        'user_id' ,
        'type' ,
        'value' ,
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }





}
