<?php


namespace App\services;


class Setting
{


    public static function add_sell_amount($price)
    {
        $sell_amount = \App\Model\Setting::where('code' , 'sell_amount')->first();
        if (isset($sell_amount) && !empty($sell_amount)){
            $pre = $sell_amount->value;
            $new = $price + $pre;

            $sell_amount->update([
                'value' => $new
            ]);

            $sell_amount->save();

        }
    }
}
