<?php


namespace App\Utility\Feed;


class Feed
{
    const AUTOMATIC = 1, MANUAL = 2 ;


    public static function items()
    {
        return [
            self::AUTOMATIC =>__('site.automatic'),
            self::MANUAL => __('site.manual'),


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
}
