<?php

namespace App\Model\Language;

use App\Traits\HasUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Image\HasImage;

class Lang extends Model
{
    use SoftDeletes , HasUser , HasImage;
    protected $fillable = [
        'creator_id', 'title', 'flag', 'code', 'status'
    ];
    protected $dates = ['deleted_at'];

    public function translates()
    {
        return $this->hasMany(Translate::class , 'lang_id');
    }

}
