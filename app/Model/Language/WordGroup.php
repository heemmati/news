<?php

namespace App\Model\Language;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WordGroup extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'title', 'name', 'slug', 'status'
    ];
    protected $dates = ['deleted_at'];

    public function words()
    {
        return $this->hasMany(Word::class , 'word_group_id');
    }
}
