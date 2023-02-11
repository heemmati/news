<?php


namespace App\Traits\Shop;

use App\Model\Shop\Sell;

trait CanSold
{

    public function sells()
    {
        return $this->morphMany(Sell::class, 'sellable');
    }


    public function getSoldAttribute()
    {
        return $this->sells()->first();
    }


}
