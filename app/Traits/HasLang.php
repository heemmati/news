<?php


namespace App\Traits;


use App\Scopes\LangScope;

trait HasLang
{
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new LangScope());


    }
}
