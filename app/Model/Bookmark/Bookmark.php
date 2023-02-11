<?php

namespace App\Model\Bookmark;

use App\Traits\HasUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bookmark extends Model
{
    use SoftDeletes , HasUser;
    protected $fillable = [
        'user_id'	,	'bookmarkable_id',	'bookmarkable_type'

    ];

    protected $dates = ['deleted_at'];


    public function bookmarkable()
    {
        return $this->morphTo();
    }
}
