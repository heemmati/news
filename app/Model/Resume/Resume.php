<?php

namespace App\Model\Resume;

use App\Traits\HasUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Resume extends Model
{
    use SoftDeletes ,HasUser;
    protected $fillable = [
        'creator_id',
        'title',
        'post',
        'where',
        'description',
        'status',
        'start',
        'end',
    ];

    protected $dates = ['deleted_at'];
}
