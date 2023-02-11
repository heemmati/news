<?php

namespace App\Model;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Activation extends Model
{
    //
    protected $fillable = [
        'code', 'mobile', 'email', 'used', 'expire_date'
    ];


    public function scopeCode($query, $email, $mobile)
    {

        $code = $this->code_generator();



        return $query->create([
            'code' => $code,
            'email' => $email,
            'mobile' => $mobile,
            'expire_date' => Carbon::now()->addMinutes(3),
        ]);





    }

    public function code_generator()
    {

        $rand = rand(1111, 9999);
        return $rand;


    }
}
