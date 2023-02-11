<?php

namespace App\Http\Controllers\Client\Basket;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use App\Model\Basket\Basket;
use App\Model\Basket\BasketItem;
use App\Model\Finance\Finance;
use App\Model\Finance\ItemFinance;
use App\Model\Shop\Sell;

class BasketController extends Controller
{

    public function add(Request $request)
    {
       $sell_id = $request->input('sell_id');
       $user = auth()->user();
       $operation = false;
  DB::beginTransaction();
       if( isset($sell_id) && !empty($sell_id) && isset($user) && !empty($user) ){


        $sell = Sell::findOrFail($sell_id);


        // Count
         $count = $request->input('count');
         if(!isset($count) || empty($count) || $count <= 0){
            $count = 1;
         }




         // Find Basket

         $basket = $user->basket;

         if( !isset($basket) || empty($basket) || count($basket) <= 0  || !isset($basket[0]) || empty($basket[0])){

            $basket_created = Basket::create([
                'user_id' => $user->id ,
                'total' => 0 ,
                'status' => 1
            ]);

            if($basket_created instanceof Basket){
                $basket = $basket_created;
            }
            else{
                $operation = false;

            }

         }

         else{
             $basket = $basket[0];
         }


         // Find Basket Item

         $basket_item = $basket->items()->where('basketable_id' , $sell_id)->first();

         if(isset($basket_item) && !empty($basket_item)){
            $finance = $basket_item->finance;
            if(isset($finance) && !empty($finance)){

                $price = $sell->price;
                $pre_count = $finance->count;
                $new_count = $pre_count + $count;

                $payable = $new_count * $price;

                    $finance->update([
                       'payable' => $payable,
                       'count' => $new_count,

                    ]);

                    if($finance->save()){

                        $operation = true;

                    }
                    else{
                        $operation = false;

                    }
            }

         }
         else{


            $basket_item = BasketItem::create([
                'basket_id'	=> $basket->id ,
                'basketable_id'	=> $sell->id  ,
                'basketable_type' => get_class($sell)	,
                'status' => 1
            ]);

            if($basket_item instanceof BasketItem){

                $price = $sell->price;
                $payable = $price * $count;

                $finance = ItemFinance::create([
                    'item_financeable_id' => $basket_item->id ,
                        'item_financeable_type' => get_class($basket_item),
                            'payable' => $payable,
                                'price' => $price 	,
                                'count' => $count	,
                                'unit' => 1	,
                                 'status' => 1
                ]);

                if($finance instanceof ItemFinance){


                    $operation = true;

                }
                else{
                    $operation = false;
                }
            }


         }







       }
       else{
        $operation = false;
       }



       if($operation == true){
        DB::commit();

        $items = $basket->items;
      $returnHTML = view('admin.inc.small_cat', compact('items'))->render();
     //    return response()->json(array('success' => true, 'html' => $returnHTML));


     return response()->json(array('success' => true , 'html' => $returnHTML));

     }
     else{
        DB::rollBack();
        return response()->json(array('success' => false));
     }

    }

    public function index(){
        $user = auth()->user();
        if(isset($user) && !empty($user)){
            $basket = $user->basket[0];
            if(isset($basket) && !empty($basket)){
                $items = $basket->items;

            }
        }


        return view('basket::site.cart' , compact('items' , 'basket'));
    }


    public function update_basket_count(Request $request)
    {

        DB::beginTransaction();
        $count = $request->input('count');
        $sell_id = $request->input('sell');

        // $has_stock = BasketService::stock_compare($abstract, $count);



        $user = auth()->user();
        $basket = $user->basket;
        if(isset($basket[0]) && !empty($basket[0])){
            $items = $basket[0]->items;
            if(isset($items) && !empty($items && count($items) > 0)){

            foreach ($items as $item) {

                if ($item->basketable_id == $sell_id) {

                    $price = $item->finance->price;
                    $payable = $count * $price;
                    $item->finance()->update([
                        'price' => $price,
                        'count' => $count,
                        'payable' => $payable,
                    ]);



                    if ($item->save()) {
                        DB::commit();
                        alert()->success(__('site.done'), __('site.number_changed'));
                        return back();
                    }
                }
            }
        }
        }
        else{
            DB::rollBack();
            alert()->error(__('site.no_stocki'), __('site.stock_is_lesser'));
            return back();

        }





    }

    public function remove_basket($sell_id)
    {
        if (isset($sell_id) && !empty($sell_id) && is_numeric($sell_id)) {


                /* Get Basket Items  */
                $user = \auth()->user();
                $basket = $user->basket;
                if(isset($basket) && !empty($basket[0] && !empty($basket))){
                    $items = $basket[0]->items;
                    /* Get Basket Items  */


                    foreach ($items as $item) {
                        if ($item->basketable_id == $sell_id) {
                            /* Remove Target Abstract */
                            $item->delete();
                        }
                    }

                    toast()->success(__('site.remove_successfully'));
                    return back();
                }




        }
    }

}
