<?php


namespace App\Utility;


class AbstractProduct
{
    const REAL = 1 , FAKE = 0;

    public static function origins()
    {
        return [
            self::REAL => 'کالای اصل',
            self::FAKE => 'کالای غیر اصل',
        ];
    }
}
