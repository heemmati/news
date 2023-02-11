<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Relations\Relation;
use App\Model\News\Article;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        Schema::defaultStringLength(255);


        //



//        Relation::morphMap([
//            'article' => Article::class,
//            'videos' => 'App\Models\Video',
//        ]);
//


        Blade::directive('checkset' , function ($isset){
            return "<?php if(  isset({$isset})  && !empty({$isset})  ) : echo {$isset}; endif;?>";
        });

        /* isset && !empty*/
        Blade::directive('ischeck' , function ($isset){
            return "<?php if(  isset({$isset})  && !empty({$isset})   ) : ?>";
        });


        Blade::directive('endischeck' , function ($isset){
            return '<?php endif; ?>';
        });


    }
}
