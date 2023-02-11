<?php

namespace App\Model\Basket;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Finance\HasItemFinance;
use App\Model\Shop\Sell;

class BasketItem extends Model
{
    use SoftDeletes , HasItemFinance;
    protected $fillable = [
        'basket_id'	,'basketable_id'	,'basketable_type'	,'status'
    ];
    protected $dates = ['deleted_at'];


    public function basket(){
        return $this->BelongsTo(Basket::class , 'basket_id');
    }

    public function sell(){
        return $this->belongsTo(Sell::class , 'basketable_id');
    }



}
