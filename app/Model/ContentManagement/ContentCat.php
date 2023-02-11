<?php

namespace App\Model\ContentManagement;

use App\Traits\HasUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContentCat extends Model
{
    use SoftDeletes  , HasUser;
    protected $fillable = [
        'creator_id',	'title'	,'status'    ];

    protected $dates = ['deleted_at'];


}
