<?php

namespace App\Model\Search;

use App\Traits\HasUser;
use Illuminate\Database\Eloquent\Model;

class Search extends Model
{
    use HasUser;
    protected $fillable = [
        'user_id',
        'ip' ,
        'search' ,
        'count' ,
    ];
}
