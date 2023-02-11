<?php


namespace App\Scopes;


use App\Model\General;
use App\Model\Menu;
use App\Model\MenuItem;
use http\Client\Request;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class LangScope implements Scope
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




        if (get_class($model) != Menu::class && get_class($model) != General::class && get_class($model) != MenuItem::class)
        if (!empty($model->getFillable())){
            if (in_array('lang' , $model->getFillable())){

                $builder->where('lang' , config('app.locale'));
            }
        }



    }
}
