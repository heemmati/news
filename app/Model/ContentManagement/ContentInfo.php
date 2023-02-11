<?php

namespace App\Model\ContentManagement;

use App\Traits\HasUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContentInfo extends Model
{
    use SoftDeletes  , HasUser;
    protected $fillable = [
        	'content_cat_id',	'order_item_id',	'title'	,'description',	'keywords'	,'end_date',	'site_name',	'month_name'	,'downloaded',	'status'	    ];

    protected $dates = ['deleted_at'];

}
