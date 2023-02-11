<?php

namespace App\Model\Plan;

use Illuminate\Database\Eloquent\Model;

class Usage extends Model
{
    //
    protected $fillable = [
        'permission_id',
        'user_id',
        'start_date',
        'usage_count',
    ];
}
