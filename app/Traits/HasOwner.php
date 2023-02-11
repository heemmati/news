<?php


namespace App\Traits;


use App\Lubricator\Auth;
use App\Scopes\OwnerScope;

trait HasOwner
{
    protected static function boot()
    {
        parent::boot();

        if (Auth::isUser(\auth()->id())){
            static::addGlobalScope(new OwnerScope());
        }


    }


}
