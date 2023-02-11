<?php

namespace App\Model\User;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    protected $fillable = [
        'user_id' ,
        'status' ,
        'message' ,
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
