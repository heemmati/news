<?php

namespace App\Model\Journal;

use App\Traits\Base\HasBase;
use App\Traits\HasTime;
use App\Traits\HasUser;
use App\Traits\ImageBox\HasImageBox;
use App\Traits\Tag\HasTag;
use Illuminate\Database\Eloquent\Model;

class Journal extends Model
{
    //
    use HasUser , HasImageBox , HasBase , HasTime , HasTag;
    protected $fillable = [
        'user_id', 'status'
    ];



}
