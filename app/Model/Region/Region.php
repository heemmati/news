<?php

namespace App\Model\Region;

use App\Model\Feed\Feed;
use App\Model\News\Article;
use App\Traits\Base\HasBase;
use App\Traits\Image\HasImage;
use App\Traits\Role\IsLimited;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Region extends Model
{
    use SoftDeletes, HasBase, HasImage, IsLimited;

    protected $fillable = [
        'creator_id', 'type', 'status'
    ];


    public function articles()
    {
        return $this->morphedByMany(Article::class, 'regionable');
    }

    public function feeds()
    {
        return $this->morphedByMany(Feed::class, 'regionable');
    }


    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($region){

            $region->base->delete();




            $region->images()->detach();
            $region->roles()->detach();
            $region->articles()->detach();
            $region->feeds()->detach();



        });



    }



}
