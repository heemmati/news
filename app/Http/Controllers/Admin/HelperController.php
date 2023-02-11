<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Helper;
use Illuminate\Http\Request;

class HelperController extends AdminController
{
    //
    public function __construct()
    {

        parent::__construct(new Helper());


    }

    public function seller_index()
    {

        $helpers = Helper::where('status' , 1)->get();
        return view('admin.learn.list' , compact('helpers'));
    }

    public function seller_helper($article){

        if (isset($article) && !empty($article)){
            $helper = Helper::where('slug' , $article)->first();
            if (isset($helper) && !empty($helper)){

                return view('admin.learn.single' , compact('helper'));

            }
            else{
                alert()->error('خطا' , 'مقاله مورد نظر یافت نشد');
                return back();
            }
        }
        else{
            alert()->error('خطا' , 'مقاله مورد نظر یافت نشد');
            return back();
        }
    }
}
