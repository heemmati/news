<?php

namespace App\Model\Social;

use App\Traits\HasUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Icon\HasIcon;

class Social extends Model
{
    use SoftDeletes, HasUser , HasIcon;
    protected $fillable = [
        'creator_id', 'title', 'entitle', 'description', 'color', 'status'
    ];
    protected $dates = ['deleted_at'];


    public function socialable()
    {
        return $this->morphTo();
    }


}
