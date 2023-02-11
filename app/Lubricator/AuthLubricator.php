<?php


namespace App\Lubricator;


use App\User;

class AuthLubricator
{
    public static function isAdmin($user_id)
    {
        $user = User::findOrFail($user_id);
        if ($user->role == 'Admin'){
            return true;
        }
        else{
            return false;
        }
    }

    public static function isSuperAdmin($user_id)
    {
        $user = User::findOrFail($user_id);
        if ($user->role == 'Super Admin'){
            return true;
        }
        else{
            return false;
        }
    }

    public static function isUser($user_id)
    {
        $user = User::findOrFail($user_id);

        if ($user->role == 'User'){

            return true;
        }
        else{

            return false;
        }
    }

    public static function UserIs($user_id)
    {


    }
}
