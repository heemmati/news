<?php

namespace App\Model\Advertisment;

use App\Traits\HasUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AdvertismentType extends Model
{
    use SoftDeletes , HasUser;

    protected $fillable = [
        'creator_id'	,
        'title'	,
        'description'	,
        'status'
    ];

    protected $dates = ['deleted_at'];

    public function tariffs()
    {
        return $this->hasMany(AdsTariff::class , 'type_id');
    }


}
