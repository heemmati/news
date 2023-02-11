<?php

namespace App\Model\Skill;

use App\Traits\HasUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Techno\HasTechnology;

class Skill extends Model
{
    use SoftDeletes, HasTechnology , HasUser;
    protected $fillable = [
        'creator_id',
        'title',
        'entitle',
        'history',
        'description',
        'percentage',
        'status'
    ];

    protected $dates = ['deleted_at'];

}
