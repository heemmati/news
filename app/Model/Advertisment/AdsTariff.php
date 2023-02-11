<?php

namespace App\Model\Advertisment;

use App\Traits\HasUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AdsTariff extends Model
{
    use SoftDeletes, HasUser;

    protected $fillable = [
        'creator_id',
        'type_id',
        'title',
        'description',
        'price',
        'status'
    ];
    protected $dates = ['deleted_at'];

    public function type()
    {
        return $this->belongsTo(AdvertismentType::class, 'type_id');
    }

}
