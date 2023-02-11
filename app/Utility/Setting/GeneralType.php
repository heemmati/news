<?php


namespace App\Utility\Setting;


class GeneralType
{

    CONST TEXT = 1;
    CONST HTML = 2;
    CONST IMAGE = 3;




    public static function types()
    {
        return [
            self::TEXT => 'متن کوتاه',
            self::HTML => 'متن بلند (ویرایشگر)',
            self::IMAGE => 'تصویر',
        ];
    }

    public static function get_type($type)
    {

        switch ($type) {
            case self::TEXT:
                return 'متن کوتاه';
                break;
            case self::HTML:
                return 'متن بلند (ویرایشگر)';
                break;
            case self::IMAGE:
                return 'تصویر';
                break;
            default:
                return 'متن کوتاه';

        }

    }


    public static function get_input($general_type)
    {

        switch ($general_type) {
            case self::TEXT:
                return 'components.form.text';
                break;
            case self::HTML:
                return 'components.form.textarea';
                break;
            case self::IMAGE:
                return 'components.form.filemanager.image';
                break;
            default:
                return 'components.form.text';

        }
    }
}
