<?php


namespace App\Traits\Finance;

use App\Model\Finance\ItemFinance;

trait HasItemFinance
{

    public function finance()
    {
       return $this->morphOne(ItemFinance::class, 'item_financeable');

    }

}
