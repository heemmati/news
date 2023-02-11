<?php

namespace App\Model\Advertisment;

use App\Traits\HasUser;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use const App\Traits\USER;

class Advertisment extends Model
{
    use SoftDeletes , HasUser;
    protected $fillable = [
        'creator_id'	,'asor_id'	,'tariff_id',	'time',	'start_date',
        'text',	'body',	'code',	'mobile'
        ,'end_date'	,'status'
    ];

    protected $dates = ['deleted_at'];

    public function asor()
    {
        return $this->belongsTo(User::class , 'asor_id');
    }

    public function tariff()
    {
        return $this->belongsTo(AdsTariff::class , 'tariff_id');
    }






    }
