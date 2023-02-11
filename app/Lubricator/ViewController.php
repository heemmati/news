<?php


namespace App\Lubricator;


use App\Events\CreateModelEvent;
use App\Traits\Viewer;
use App\Utility\Acl;
use App\Model\Shop\Category;

class ViewController
{


    /* Generate All Forms*/
    public static function get_select_items($view , $input_class){

        if ($view == 'utility') {
            $items = $input_class::items();

        }

        else if ($view == 'select' OR $view == 'multiselect') {

            $items = $input_class::latest()->get();

        }

        else if ($view == 'category') {
            $items = $input_class::latest()->where('parent_id', 0)->get();

        }

        else {
            $items = NULL;

        }

        return $items;
    }


    public static function form_generator($inputs, $route_name, $object = NULL, $parent_id = NULL, $model_name = Null)
    {

        echo view('admin.library.row_before');
        self::form_wrapper_generator($inputs, $route_name, $object, $parent_id);
        if (isset($model_name) && !empty($model_name)) {
            event(new CreateModelEvent($model_name, $object));
        }

        echo view('admin.library.row_after');
    }

    public static function form_wrapper_generator($inputs, $route_name, $object, $parent_id = NULL)
    {


        echo view('admin.library.input_before');

        if (isset($inputs) && !empty($inputs)) {

            foreach ($inputs as $key => $input) {
                self::input_generator($key, $input, $route_name, $object, $parent_id);
            }
        }
        echo view('admin.library.input_after');
    }

    public static function input_generator($key, $input_array, $route_name, $object = NULL, $parent_id = NULL)
    {


        $requirment = isset($input_array[0]) && !empty($input_array[0]) == true ? $input_array[0] : '';
        $input_type = isset($input_array[1]) && !empty($input_array[1]) == true ? $input_array[1] : '';
        $input_class = isset($input_array[2]) && !empty($input_array[2]) == true ? $input_array[2] : '';



        if ($key != 'status' || auth()->user()->can('panel.change.status')) {

            if (!in_array('access', $input_array) || Acl::isSuperAdmin(auth()->id())) {

                if ($key != 'morphable') {

                    $view = self::define_input($input_type);
                    $items = self::get_select_items($view, $input_class);
                    $input = $input_type;

                    $type = __('routes.' . $route_name . '_singular');
                    $field = $key;
                    $fieldFa = __('admin.' . $key);
                    $important = self::issetingViaValue($requirment, '1');
                    $value = NULL;

                    if (isset($object) && !empty($object)) {
                        $value = $object->$key;
                    }


                    echo view('admin.forms.' . $view, compact(
                        'input',
                        'type',
                        'important',
                        'value',
                        'field',
                        'fieldFa',
                        'items',
                        'parent_id',
                        'route_name'


                    ));

                }

                else {
                    echo  self::morph_input_generator($input_array , $route_name);
                }

            }

        }


    }

    public static function morph_input_generator($input_array , $route_name)
    {
        foreach ($input_array as $morh) {

            $requirment = isset($morh[0]) && !empty($morh[0]) == true ? $morh[0] : '';
            $input_type = isset($morh[1]) && !empty($morh[1]) == true ? $morh[1] : '';
            $input_class = isset($morh[2]) && !empty($morh[2]) == true ? $morh[2] : '';




            $view = self::define_input($input_type);

            $items = self::get_select_items($view , $input_class);



            $input = $morh[1];
            $type = __('routes.' . $route_name . '_singular');
            $field = $morh[1];
            $fieldFa = __('admin.' . $morh[1]);
            $important = self::issetingViaValue($requirment, '1');

            if (isset($object) && !empty($object)) {

                if ($input_type == 'gallery') {
                    $value = $object->images;


                } elseif ($input_type == 'tags') {
                    $tags = $object->tags;

                    $value = [];
                    foreach ($tags as $item) {
                        array_push($value, $item->name);
                    }

                    $value = implode(',', $value);

                }


            }
            else {
                $value = null;
            }

            $parent_id = null;
            echo view('admin.forms.' . $view, compact(
                'input',
                'type',
                'important',
                'value',
                'field',
                'fieldFa',
                'items',
                'parent_id'
            ));


        }
    }

    public static function define_input($input)
    {
        switch ($input) {

            case 'utility' :
                return 'utility';
                break;

            case 'select':
                return 'select';
                break;

            case 'body':
            case 'description':
                return 'textarea';
                break;

            case 'image':
            case 'file':
                return 'image';
                break;
            case 'gallery' :
                return 'gallery';
                break;
            case 'map' :
                return 'map';
                break;
            case 'tags' :
                return 'tags';
                break;
            case 'multiselect' :
                return 'multiselect';
                break;
            case 'hidden' :
                return 'hidden';
                break;
            case 'category' :
                return 'category';
                break;
            default:
                return 'text';
        }
    }

    public static function issetingViaValue($input, $value)
    {
        if (isset($input) && !empty($input)) {
            if ($input == $value) {
                return $input;
            } else {
                return NULL;
            }
        } else {
            return NULL;
        }
    }

    public static function form_generator_without_model($inputs, $route_name, $object, $parent_id = NULL, $model_name = Null)
    {


        self::form_wrapper_generator($inputs, $route_name, $object, $parent_id = NULL);


    }

    public static function isseting($input)
    {
        if (isset($input) && !empty($input)) {
            return $input;
        } else {
            return false;
        }
    }

    public static function category_levels($parent, $counter, $value)
    {


        $category = Category::findOrFail($parent);

        if ($category->parent_id == 0) {
            $items = Category::where('parent_id', 0)->get();
            echo view('admin.helpers.categories_child', compact('items', 'counter'));
        } else {
            $category = $category->parent;
            $items = $category->children;

            echo view('admin.helpers.edit_category', compact('category', 'items', 'counter', 'value'));
        }


    }

    public static function category_level_find($parent)
    {
        $category1 = Category::findOrFail($parent);
        $counter = 0;

        for ($i = 0; $i < 20; $i++) {
            if ($category1->parent_id == 0) {
                break;
            } else {

                $category1 = $category1->parent;
                $counter++;
            }
        }

        return $counter;
    }


}
