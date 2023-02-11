<?php

namespace App\Model\Techno;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cases extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'creater_id'	,'title'	,'parent_id',	'link'	,'price'	,'infect'	,'status'
    ];
    protected $dates = ['deleted_at'];
}
