<?php

namespace App\Model\Shop;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sell extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'user_id',	'code',	'price',	'stock',	'buyCount',	'unit',	'sellable_type',	'sellable_id'	,'status'
    ];

    protected $dates = ['deleted_at'];


    public function sellable()
    {
        return $this->morphTo();
    }


}
