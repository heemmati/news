<?php

namespace Modules\Plan\Http\Controllers\Admin;

use App\Http\Controllers\Admin\AdminController;
use App\User;
use App\Utility\Acl;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Model\Plan\Plan;

class PlanController extends AdminController
{
    public function __construct()
    {

        parent::__construct(new Plan());


    }

    public function show_plans()
    {
        $user = auth()->user();
        $plans = Plan::where('role_id' , $user->role )->get();
        if (isset($plans) && !empty($plans) && count($plans) > 0){
            return view('plan::plan.index' , compact('plans'));
        }
        else{
            alert()->error('خطا' , 'هیچ پلنی برای نقش شما یافت نشد!');
            return back();
        }

    }

}
