<?php

namespace App\Model\Sale;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invoice extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'min_price', 'max_price', 'sale_id'
    ];
    protected $dates = ['deleted_at'];
}
