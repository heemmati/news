<?php

namespace App\Model\Contact;


use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'name'	,'email'	,'mobile'	,'message'
    ];


}
