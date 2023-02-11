<?php

namespace App\Model\Language;

use App\Traits\HasUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Translate extends Model
{
    use SoftDeletes , HasUser;
    protected $fillable = [
        'creator_id'	,'lang_id',	'word_id'	,'title'
    ];
    protected $dates = ['deleted_at'];

    public function word()
    {
        return $this->belongsTo(Word::class , 'word_id');
    }

    public function lang()
    {
        return $this->belongsTo(Lang::class , 'lang_id');
    }


}
