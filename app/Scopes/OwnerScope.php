<?php


namespace App\Scopes;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class OwnerScope implements Scope
{

    /**
     * Apply the scope to a given Eloquent query builder.
     *
     * @param \Illuminate\Database\Eloquent\Builder $builder
     * @param \Illuminate\Database\Eloquent\Model $model
     * @return void
     */
    public function apply(Builder $builder, Model $model)
    {
//        dd(url()->previous());
//        dd('sd');
        if (!empty($model->getFillable())){
            if ( array_key_exists('lang' , $model->getFillable())){
                $builder->where('lang' , config('app.locale'));
            }
        }



    }
}
