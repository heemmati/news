<?php


namespace App\Utility;


class Discount
{
    const PERCENTAGE = 'percentage' , AMOUNT = 'amount';


    public static function base_on()
    {
        return [
            self::PERCENTAGE => 'درصدی',
            self::AMOUNT => 'مقداری',
        ];
    }

    public static function target_on()
    {

    }
}
