<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Watch extends Model
{
    //
    protected $fillable = [
        'user_id', 'watchable_id', 'watchable_type', 'watched'
    ];

    public function watchable()
    {
        return $this->morphTo();
    }


    public function user(){
        return $this->belongsTo(User::class);
    }
}
