<?php


namespace App\Traits;


use App\Utility\Acl;
use Illuminate\Support\Facades\Auth;

trait ErrorMethods
{

    public function show_error_view($e)
    {
        $message =  $e->getMessage();

        if(!Auth::guest()){
            if (Acl::isSuperAdmin(auth()->id())){
                return view('errors.global' , compact('message'));
            }
            else{
                return view('errors.617');
            }
        }
        else{
            return $message;
        }

    }

    public function global_error($e)
    {
        $message =  $e->getMessage();
         if(!Auth::guest()){
        if (Acl::isSuperAdmin(auth()->id())){
            return view('errors.global' , compact('message'));
        }
        else{
            return view('errors.617');
        }
    }
    else{
        return $message;
    }
    }
}
