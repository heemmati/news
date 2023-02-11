<?php

namespace App\Providers;

use App\Http\View\Composers\MasterComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //

        View::composer(['admin.layout.master' , 'admin.layout.master2' ], function ($view) {
            //

            $composer = new MasterComposer();
            $composer->composeMaster($view);


        });
        View::composer('site.layout.master', function ($view) {
            //
            $composer = new MasterComposer();
            $composer->front($view);


        });

        View::composer('auth.layout.master', function ($view) {
            //

            $composer = new MasterComposer();
            $composer->login($view);


        });

        View::composer('auth.layout.master2', function ($view) {
            //


            $composer = new MasterComposer();
            $composer->auths($view);


        });

    }
}
