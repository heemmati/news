<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Modules\Shop\Traits\HasOtherPayment;

class Wallet extends Model
{
    //
    use HasOtherPayment ;
    protected $fillable = [
        'rewards' ,
        'money' ,
        'money2' ,
        'unit2' ,
        'unit' ,
    ];
}
