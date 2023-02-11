<?php

namespace App\Http\Controllers\Admin\Orderment;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Model\Basket\Basket;
use App\Utility\Shop\Product;

class OrdermentController extends Controller
{

    public function checkout()
    {

        try {
            $user_id = auth()->id();
            if (isset($user_id) && !empty($user_id)) {
                $user = auth()->user();
                $basket = Basket::where('user_id', $user_id)->first();


                if (isset($basket) && !empty($basket)) {


                    $basket_total_raw = $this->get_basket_total($user, $basket, false);
                    $basket_total = $basket_total_raw['total'];

                    $tax = Product::price_with_unit_return($basket_total);
                    $payable = Product::price_with_unit_return($basket_total);


                    if (isset($basket) && !empty($basket)) {
                        $items = $basket->items;
                        return view('module.orderment.site.checkout', compact(
                            'items',

                            'tax',
                            'basket_total',
                            'basket',
                            'payable'
                        ));
                    } else {

                    }

                } else {
                    return redirect('/');
                }

            } else {
                return redirect()->route('login');
            }
        } catch (\Throwable $exception) {
            dd($exception);
            return $this->show_error_view($exception);
        }


    }

    public function get_basket_total($user, $basket, $checkout = false)
    {

            $basket_total['total'] = $basket->total;
            $basket_total['discount_id'] = null;
            $basket_total['discounted'] = 0;



        return $basket_total;
    }


}
