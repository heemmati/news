<?php


namespace App\Utility;


abstract class Utility
{
    public static $amount= [];
    public static $title = [];

    public static function items(){
        return self::$title;
    }

    public static function get_item($item){
        return array_search($item , self::$title);
    }
}
