<?php

namespace App\Model\Finance;

use Illuminate\Database\Eloquent\Model;

class ItemFinance extends Model
{
    protected $fillable = [
        'item_financeable_id',	'item_financeable_type',	'payable',	'price',	'count',	'unit',	'status'
    ];

    public function item_financeable()
    {
        return $this->morphTo();
    }
}
