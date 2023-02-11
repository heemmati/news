<?php

namespace App\Model\News;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ArticleType extends Model
{
    use  SoftDeletes;
    protected $fillable = [
        'title',
        'entitle',
        'code'
    ];

    protected $dates = ['deleted_at'];

    public function articles(){
        return $this->hasMany(Article::class , 'type');
    }


}
