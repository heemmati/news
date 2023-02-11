<?php

namespace Modules\Category\Entities;

use App\Model\Article;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categoriables extends Model
{
    use SoftDeletes;

    protected $fillable = [
      	'category_id' ,
        'categoriable_id' ,
        'categoriable_type'
    ];

    protected $dates = ['deleted_at'];


}
