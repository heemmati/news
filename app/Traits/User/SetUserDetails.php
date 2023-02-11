<?php


namespace App\Traits\User;


use App\Model\User\UserDetail;

trait SetUserDetails
{

    public function details()
    {
        return $this->hasOne(UserDetail::class);
    }




}
