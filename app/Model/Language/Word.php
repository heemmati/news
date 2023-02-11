<?php

namespace App\Model\Language;

use App\Traits\HasUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Word extends Model
{
    use SoftDeletes, HasUser;
    protected $fillable = [
        'creator_id', 'word_group_id', 'title', 'code'
    ];
    protected $dates = ['deleted_at'];

    public function group()
    {
        return $this->belongsTo(WordGroup::class, 'word_group_id');
    }

    public function translates()
    {
        return $this->hasMany(Translate::class, 'word_id');
    }

    public function interper($lang)
    {
        $translate = $this->translates()->where('lang_id', $lang)->first();
        if (isset($translate) && !empty($translate)){
            return $translate->title;
        }
        else{
            return null;
        }

    }
}
