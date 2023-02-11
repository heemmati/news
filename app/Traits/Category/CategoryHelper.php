<?php


namespace App\Traits\Category;


use Illuminate\Http\Request;
use App\Model\Category\Category;

trait CategoryHelper
{

    public function get_all_categories($model)
    {
        //$categories = Category::where('type', $model)->where('status', 1)->get();
        $categories = Category::where('type', $model)->get();


        return $categories;
    }

    public function connect_object_category_via_request($object, Request $request)
    {
        $categories = $request->input('categories');

            $category_insertation = $this->connect_object_category($object, $categories);



        return $category_insertation;
    }

    public function connect_object_category($object, $categories): bool
    {

        $category = $object->categories()->sync($categories);
        if ($category) {
            return true;
        } else {
            return false;
        }
    }
}
