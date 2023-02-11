<?php

namespace App\Http\Middleware;

use App\Utility\Acl;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class RouteMiddleware
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


        $instance = $request;
        $acl = new Acl();
        if($acl->canAccess($instance)){
                return $next($request);
        }
        else{


            return redirect()->route('admin.panel');
        }
    }
}
