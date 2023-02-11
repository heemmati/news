<?php

namespace App\Model\Basket;

use App\Traits\HasUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Basket extends Model
{
    use SoftDeletes , HasUser;
    protected $fillable = [
        'user_id'	,'total'	,'status'
    ];
    protected $dates = ['deleted_at'];


    public function items(){
        return $this->hasMany(BasketItem::class , 'basket_id');
    }

    public function getPayableAttribute($value)
    {
        $items = $this->items;
        $payable = 0;
        if(isset($items) && !empty($items)){

            foreach($items as $item){

                $payable = $payable + $item->finance->payable;
            }

        }

        return $payable;

    }
}
