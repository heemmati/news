<?php

namespace App\Model\ContentManagement;

use App\Traits\HasUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Shop\CanSold;

class ContentType extends Model
{


    use SoftDeletes, CanSold, HasUser;

    protected $fillable = [
        'user_id',
        'code',
        'title',
        'description',
        'word_count',
        'offedprice',
        'commission1',
        'commission2',
        'commission3',
        'image_count',
        'status'

    ];


    protected $dates = ['deleted_at'];




}
