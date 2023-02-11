<?php


namespace App\Traits\User;


use App\Model\User\Follow;

trait SetFollow
{

    public function followers()
    {
        return $this->hasMany(Follow::class , 'follower_id');
    }

    public function followings()
    {
        return $this->hasMany(Follow::class , 'following_id');
    }



}
