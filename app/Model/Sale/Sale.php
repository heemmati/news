<?php

namespace App\Model\Sale;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Techno\HasCase;
use App\Traits\Techno\HasTechnology;

class Sale extends Model
{
    use SoftDeletes , HasCase , HasTechnology;
    protected $fillable = [
        'name'	,'mobile',	'phone',	'introduction'	,'website'	,'price',	'brand'	,'activities',	'description',	'status'
    ];
    protected $dates = ['deleted_at'];

    public function trackings()
    {
        return $this->hasMany(Tracking::class , 'sale_id');
    }
}
