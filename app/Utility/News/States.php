<?php


namespace App\Utility\News;


class States
{
    const COUNTRY = 0;
    const ARDABIL = 1;
    const WESTAZ = 2;
    const EASTAZ = 3;
    const ESFAHAN = 4;
    const ALBORZ = 5;
    const ILAM = 6;
    const BUSHEHR = 7;
    const TEHRAN = 8;
    const BAKHTIARI = 9;
    const SOUTHKHOR = 10;
    const RAZAVIKHOR = 11;
    const NORTHKHOR = 12;
    const KHUZESTAN = 13;
    const ZANJAN = 14;
    const SEMNAN = 15;
    const SISTAN = 16;
    const FARS = 17;
    const QAZVIN = 18;
    const QOM = 19;
    const KURDESTAN = 20;
    const KERMAN = 21;
    const KERMANSHAH = 22;
    const BUYOR = 23;
    const GOLESTAN = 24;
    const GILAN = 25;
    const LORESTAN = 26;
    const MAZANDRAN = 27;
    const MARKARZI = 28;
    const HORMOZGAN = 29;
    const HAMEDAN = 30;
    const YAZD = 31;

    public static function get_items()
    {
        return [
            self::COUNTRY => 'کشوری',
            self::ARDABIL => 'اردبیل'  ,
            self::WESTAZ => 'آذربایجان غربی'  ,
            self::EASTAZ => 'آذربایجان شرقی'  ,
            self::ESFAHAN => 'اصفهان'  ,
            self::ALBORZ => 'البرز'  ,
            self::ILAM => 'ایلام'  ,
            self::BUSHEHR => 'بوشهر'  ,
            self::TEHRAN => 'تهران'  ,
            self::BAKHTIARI => 'چهارمحال بختیاری'  ,
            self::SOUTHKHOR => 'خراسان جنوبی'  ,
            self::RAZAVIKHOR => 'خراسان رضوی'  ,
            self::NORTHKHOR => 'خراسان شمالی'  ,
            self::KHUZESTAN => 'خوزستان'  ,
            self::ZANJAN => 'زنجان'  ,
            self::SEMNAN => 'سمنان'  ,
            self::SISTAN => 'سیستان و بلوچستان'  ,
            self::FARS => 'فارس'  ,
            self::QAZVIN => 'قزوین'  ,
            self::QOM => 'قم'  ,
            self::KURDESTAN => 'کردستان'  ,
            self::KERMAN => 'کرمان'  ,
            self::KERMANSHAH => 'کرمانشاه'  ,
            self::BUYOR => 'کهگیلویه و بویراحمد'  ,
            self::GOLESTAN => 'گلستان'  ,
            self::GILAN => 'گیلان'  ,
            self::LORESTAN => 'لرستان'  ,
            self::MAZANDRAN => 'مازندران'  ,
            self::MARKARZI => 'مرکزی'  ,
            self::HORMOZGAN => 'هرمزگان'  ,
            self::HAMEDAN => 'همدان'  ,
            self::YAZD => 'یزد'  ,
        ];
    }
}
