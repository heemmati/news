<?php

namespace App\Model\Like;

use App\Traits\HasUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class like extends Model
{
    use SoftDeletes , HasUser;
    protected $fillable = [
        'user_id'	,'ip',	'type',	'likeable_id',	'likeable_type'

    ];

    protected $dates = ['deleted_at'];


    public function likeable()
    {
        return $this->morphTo();
    }

}
