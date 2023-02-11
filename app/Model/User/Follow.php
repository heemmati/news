<?php

namespace App\Model\User;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Follow extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'follower_id', 'following_id'
    ];

    protected $dates = ['deleted_at'];

    public function followed()
    {
        return $this->belongsTo(User::class , 'follower_id');
    }

    public function followinged()
    {
        return $this->belongsTo(User::class , 'following_id');
    }

}
