<?php

namespace App\Model\Setting;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class General extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'creator_id', 'title', 'description'
    ];
    protected $dates = ['deleted_at'];

    public function items()
    {
        return $this->hasMany(GeneralItem::class , 'general_id');
    }
}
