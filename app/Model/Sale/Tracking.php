<?php

namespace App\Model\Sale;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tracking extends Model
{

    use SoftDeletes;
    protected $fillable = [
        'sale_id', 'isay', 'hesay', 'description'
    ];
    protected $dates = ['deleted_at'];

}
