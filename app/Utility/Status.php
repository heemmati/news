<?php


namespace App\Utility;


class Status
{


    const CONFIRMED = 1, FAILED = 2, PROGRESSING = 0;


    public static function items()
    {
        return [
            self::PROGRESSING =>__('site.processing_status'),
            self::CONFIRMED => __('site.confirmed_status'),
            self::FAILED => __('site.failed_status'),

        ];
    }

    public static function get_status($number)
    {
        switch ($number) {
            case self::CONFIRMED :
                return __('site.confirmed_status');
                break;
            case self::FAILED :
                return  __('site.failed_status');
                break;
            case self::PROGRESSING :
                return __('site.processing_status');
                break;
        }
    }

    public static function get_status_class($number)
    {
        switch ($number) {
            case self::CONFIRMED :
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
        return self::CONFIRMED;
    }
}
