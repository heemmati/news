<?php

namespace App\Model\Connection;

use App\Traits\HasUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Model\News\Article;

class Connection extends Model
{
    use SoftDeletes, HasUser;
    protected $fillable = [
        'creator_id', 'title', 'description', 'parent_id'
    ];
    protected $dates = ['deleted_at'];


    public function children(){
        return $this->hasMany(Connection::class , 'parent_id');
    }

    public function parent(){
        return $this->belongsTo(Connection::class , 'parent_id');
    }

    public function articles()
    {
        return $this->morphedByMany(Article::class, 'connectionable');
    }

}
