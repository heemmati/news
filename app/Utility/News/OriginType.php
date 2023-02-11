<?php


namespace App\Utility\News;


class OriginType
{

    const PRODUCTION = 0;
    const QUOTION = 1;
    const FAX = 2;

    public static function get_items()
    {
        return [
            self::QUOTION => 'نقلی',
            self::PRODUCTION => 'تولیدی',
            self::FAX => 'فکس',
        ];
    }


}
