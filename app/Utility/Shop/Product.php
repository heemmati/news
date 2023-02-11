<?php


namespace App\Utility\Shop;




class Product
{
    protected $childs = [];

    public static function price_with_unit($price)
    {

        $price = number_format($price, 0, ',', ',');

            echo $price . ' ' . __('site.toman');


    }

    public static function price_without_unit($price)
    {

        $price = number_format($price, 0, ',', ',');

        return  $price;


    }


    public static function price_with_unit_return($price)
    {

        $price = number_format($price, 0, ',', ',');

            return $price . ' ' . __('site.toman');



    }

    public static function get_all_children($category)
    {

        $childs = [$category->id];
        $category1 = $category->children()->get()->pluck('id')->toArray();
        $childs = array_merge($childs , $category1);
        if (isset($category->children) && !empty($category->children)){
            foreach ($category->children as $chil){
                $childs = array_merge($childs , self::get_all_children($chil));
            }

        }

//        dd($childs);

        return $childs;
    }


}
