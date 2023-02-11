<?php


namespace App\Utility;


class Lang
{
    const PERSIAN = 'fa' , ENGLISH = 'en';

    public static function languages()
    {
        return [
            self::PERSIAN => 'فارسی - fa',
            self::ENGLISH => 'English - en',
        ];
    }

    public static function items()
    {
        return [
            self::PERSIAN => 'فارسی - fa',
            self::ENGLISH => 'English - en',
        ];
    }
}
