<?php


namespace App\Utility;


class Newspaper
{

    const SENT = 1 , FAILED = 2, PROGRESSING = 0;


    public static function items()
    {
        return [
            self::SENT => 'ارسال شده',
            self::FAILED => 'ارسال نشده',
            self::PROGRESSING => 'در دست بررسی',
        ];
    }

    public static function get_status($number)
    {
        switch ($number) {
            case self::SENT :
                return 'ارسال شده';
                break;
            case self::FAILED :
                return 'ارسال نشد';
                break;
            case self::PROGRESSING :
                return 'در دست بررسی';
                break;
        }
    }

    public static function get_status_class($number)
    {
        switch ($number) {
            case self::SENT :
                return 'btn-success';
                break;
            case self::FAILED :
                return 'btn-danger';
                break;
            case self::PROGRESSING :
                return 'btn-warning';
                break;
        }
    }

    public static function is_last_status($number){
        if ($number >= 2){
            return true;
        }
        else{
            return false;
        }

    }

    public static function set_first_status()
    {
        return self::SENT;
    }

}
