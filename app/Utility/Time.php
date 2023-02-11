<?php


namespace App\Utility;


class Time
{

    public static function time_now()
    {
        $v = verta();
        return $v->format('%B %d، %Y');
    }
}
