<?php

namespace App\Http\Middleware;

use Closure;

class LanguageMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $locale = $request->segment(1);

        if (!array_key_exists($locale,config('app.locales')))
        {

            $segments = $request->segments();

            array_unshift($segments , config('app.fallback_locale'));

            if ($locale == 'panel'){

                app()->setLocale('fa');

            }
            return redirect(implode('/',$segments));
        }
        if ($request->segment(2) == 'panel' && array_key_exists($locale,config('app.locales'))){
            app()->setLocale('fa');
            return $next($request);
        }
        app()->setLocale($locale);
        return $next($request);
    }
}
