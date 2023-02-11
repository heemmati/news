<?php


namespace App\Traits;


use Highlight\RegExMatch;

trait ValidationHelper
{

    /**
     * @param $mobile
     * @return bool
     */
    public function is_valid_mobile($mobile)
    {


        if (preg_match( "/^09[0-9]{9}$/" , $mobile)) {

            return true;
        }
        else {
            return false;
        }
    }
}
