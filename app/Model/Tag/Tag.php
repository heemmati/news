<?php

namespace App\Model\Tag;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Base\HasBase;
use App\Model\News\Article;

class Tag extends Model
{
    use HasBase , SoftDeletes;
    protected $fillable = [
        'status' , 'view'
    ];
    protected $dates = ['deleted_at'];


    public function articles()
    {
        return $this->morphedByMany(Article::class, 'taggable');
    }

}
