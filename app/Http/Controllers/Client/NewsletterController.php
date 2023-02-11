<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Model\Newsletter;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NewsletterController extends Controller
{
    //
    public function store(Request $request)
    {

        /* Validation */
        Validator::make($request->all(), [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'lang' => config('app.locale')
        ]);



        /* Find Existence Email */
        $email = $request->input('email');
        $pre = Newsletter::where('email', $email)->first();
        if (isset($pre) && !empty($pre)){

            alert()->error('خطا', 'ایمیل شما در سیستم خبرنامه ما موجود است!');
            return back();

        }
        else{
            $news = Newsletter::create([
                'email' => $request->input('email')
            ]);

            if ($news instanceof Newsletter){
                alert()->success('انجام شد', 'ایمیل شما در خبر نامه ثبت شد!');
                return back();
            }
        }

    }
}
