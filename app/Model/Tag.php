<?php

namespace App\Model;

use App\Traits\HasLub;
use App\Traits\HasUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    //
    use SoftDeletes , HasUser , HasLub ;
    protected $fillable = [
        'name' ,
        'value',
        'status'  ,
        'user_id' ,
    ];

    public function articles()
    {
        return $this->morphedByMany(Article::class, 'taggable');
    }

    public function books()
    {
        return $this->morphedByMany(Book::class, 'taggable');
    }
    public function missions()
    {
        return $this->morphedByMany(Mission::class, 'taggable');
    }



}
