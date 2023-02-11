<?php

namespace App\Model\Techno;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Technology extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'creater_id',	'title',	'link',	'price',	'infect',	'entitle'
    ];
    protected $dates = ['deleted_at'];
}
