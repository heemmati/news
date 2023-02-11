<?php


namespace App\Utility\Position;


use App\Model\Category\Category;
use App\Model\News\Article;
use App\Model\Page\Page;
use App\Model\Portofolio\Portofolio;
use App\Model\Service\Service;

class Positions
{

    CONST NEWS = Article::class;
    CONST PORTOFOLIO = Portofolio::class;
    CONST CATEGORY = Category::class;
    CONST SERVICE = Service::class;
    CONST PAGE = Page::class;


    public static function get_items()
    {
        return [
            self::NEWS => 'اخبار',
            self::PORTOFOLIO => 'نمونه کار ها',
            self::CATEGORY => 'دسته بندی',
            self::SERVICE => 'خدمات',
            self::PAGE => 'برگه ها',
        ];
    }



}
