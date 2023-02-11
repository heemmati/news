<?php

namespace App\Model\Feed;

use App\Traits\Region\HasRegion;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Category\HasCategory;

class Feed extends Model
{
    use SoftDeletes , HasCategory , HasRegion;
    protected $fillable = [
        'creator_id', 'title'	,'title_class',
        'deleting',
        'striping',
        'link_class',
        'target_box' , 'link_pattern' , 'description_class',	'image_class'	,'body_class' , 'image_dom'	,'type' , 'status'
    ];
    protected $dates = ['deleted_at'];


    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($feed){





            $feed->categories()->detach();
            $feed->regions()->detach();



        });



    }



}
