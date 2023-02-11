<?php

namespace App\Model\Category;

use App\Model\News\Article;
use App\Traits\Base\HasBase;
use App\Traits\Category\HasParent;
use App\Traits\HasSlug;
use App\Traits\HasTime;
use App\Traits\Icon\HasIcon;
use App\Traits\Image\HasImage;
use App\Traits\Position\HasPosition;
use App\Traits\Theme\HasTheme;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Category extends Model
{
    use HasBase , SoftDeletes , HasTime , HasParent , HasImage , HasIcon , HasPosition , HasTheme;

    protected $fillable = [

        'user_id' ,
        'order' ,
        'parent_id' ,
        'icon' ,
        'type' ,
        'item_count',
        'status'
    ];

    protected $dates = ['deleted_at'];

    public function articles()
    {
        return $this->morphedByMany(Article::class , 'categoriable');

    }

    public function limit4articles()
    {
        return $this->morphedByMany(Article::class , 'categoriable')->limit(4);

    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($category){

            foreach ($category->articles as $article){
                $article->delete();
            }

            $category->base->delete();


            foreach ($category->children as $child){
                $child->delete();
            }
            $category->positions()->detach();
            $category->icons()->detach();
            $category->images()->detach();

        });



    }


}
