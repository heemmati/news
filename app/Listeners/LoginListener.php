<?php

namespace App\Listeners;

use App\Events\LoginEvent;
use Illuminate\Support\Facades\Session;
use App\Model\Shop\BasketItem;

class LoginListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param LoginEvent $event
     * @return void
     */
    public function handle(LoginEvent $event)
    {
        //
        $user = $event->user;
        if (isset($user) && !empty($user)) {
            $session_basket_items = Session::get('basket');
            if (isset($session_basket_items) && !empty($session_basket_items) && count($session_basket_items) > 0) {

                $basket = $user->basket()->first();

                if (isset($basket) && !empty($basket)) {
                    $basket = $basket;
                }
                else{

                    $basket = $user->basket()->create([
                        'total' => 0
                    ]);

                }

//                dd($basket->id);

                foreach ($session_basket_items as $basket_item){
                    $exist = $basket->items()->where('abstract_id' , $basket_item->abstract_id)->get();
                    if (isset($exist) && !empty($exist) && count($exist)){
                       continue;
                    }
                    else{
                        $basket->items()->create([
                            'abstract_id' => $basket_item->abstract_id ,
                            'price' => $basket_item->price ,
                            'count' => $basket_item->count ,
                        ]);
                    }


                }
                Session::forget('basket');


            }

        }
    }
}
