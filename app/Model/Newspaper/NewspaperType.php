<?php

namespace App\Model\Newspaper;

use App\Traits\HasUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NewspaperType extends Model
{
    use SoftDeletes , HasUser;
    protected $fillable = [
        'creator_id',
        'title',
        'code',
        'status'
    ];
    protected $dates = ['deleted_at'];


    public function newspapers()
    {
        return $this->hasMany(Newspaper::class, 'type_id');
    }
}
