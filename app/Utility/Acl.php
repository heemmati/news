<?php


namespace App\Utility;


use App\Model\Permission;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Model\Plan\Plot;
use App\Model\Plan\Usage;
use Illuminate\Support\Facades\Cache;

class Acl
{
    const SUPER = 1;
    const ADMIN = 2;
    const USER = 3;


    Const CLUB = 1;
    Const SCLUB = 2;
    Const MCLUB = 3;


    protected $user;
    protected $route;

    public function __construct()
    {

        $this->user = Auth::user();

    }

    public static function getRoles()
    {
        return [
            self::ADMIN => __('site.sys_manager'),
            self::USER => __('site.user'),
        ];
    }




    public static function isAdmin($user_id)
    {
        $user = User::findOrFail($user_id);
        if ($user->role == self::ADMIN) {
            return true;
        } else {
            return false;
        }
    }

    public static function isUser($user_id)
    {
        $user = User::findOrFail($user_id);
        if ($user->role == self::USER) {
            return true;
        } else {
            return false;
        }
    }

    public static function isSuperAdmin($user_id)
    {
        $user = User::findOrFail($user_id);
        if ($user->role == self::SUPER) {
            return true;
        } else {
            return false;
        }
    }

    public static function getUserRole($user_id)
    {
        $user = User::findOrFail($user_id);
        return self::getRole($user->role);
    }

    /* Role Recognization */

    public static function getRole($role)
    {
        switch ($role) {
            case self::SUPER :
                return __('site.super_admin');
            case self::ADMIN :
                return __('site.sys_manager');
            case self::USER :
                return  __('site.user');
            default :
                return  __('site.user');

        }
    }

    public static function isAccounted($user_id)
    {
        $user = User::findOrFail($user_id);
        if (isset($user->account_verification) && !empty($user->account_verification)) {
            return true;
        } else {
            return false;
        }
    }


    public static function get_all_children($user)
    {

        $childs = [];
        $category1 = $user->children()->get()->pluck('id')->toArray();
        $childs = array_merge($childs, $category1);
        if (isset($user->children) && !empty($user->children)) {
            foreach ($user->children as $chil) {
                $childs = array_merge($childs, self::get_all_children($chil));
            }

        }

        return $childs;
    }

    public static function canProfile($auth, $user)
    {
        if ($auth == $user OR self::isManager($auth)) {
           return true;
        } else {
            return false;
        }
    }

    public static function isManager($user_id)
    {
        $user = User::findOrFail($user_id);

        if ($user->role == self::ADMIN || $user->role == self::SUPER) {

            return true;
        } else {

            return false;
        }
    }



    public function canAccess($request)
    {



        $route = $this->getRouter();


        if ($this->checkFromRoutes($route)) {

            if ($this->user->can($route)) {




                /* Plans */
                $plans = Cache::remember('user_plan'.$this->user->id, 36000, function ()  {
           return $this->user->plans;
                });
                
                
                $permission = Cache::remember('permission_rooooute'.$route, 36000, function () use($route) {
           return Permission::where('slug', $route)->first();
                });
            
                $no = 0;
                if (isset($plans) && !empty($plans) && count($plans) > 0) {

                    foreach ($plans as $plan) {
                        $plots = Plot::where('plan_id', $plan->plan_id)->where('permission_id', $permission->id)->first();
                        $usage = Usage::where('user_id', $this->user->id)->where('permission_id', $permission->id)->first();

                        if (isset($plots) && !empty($plots)) {
                            if (isset($usage) && !empty($usage)) {

                                $now = Carbon::now();
                                if ($usage->usage_count < $plots->limit_count && $now < $plots->end_date) {

                                    $this->usage_increment($usage);

                                    return true;
                                }
                            }
                            else{
                                $no = 1;
                            }
                        }
                        else {
                            $no = 1;
                        }
                    }
                    if ($no) {
                        return true;
                    }

                    alert()->error(__('site.fail'), __('site.upgrade_panel'));
                    return false;
                }
                return true;


            }
            else {
                return false;
            }
        } else {
            return true;
        }

    }

    public function getRouter()
    {
        return Route::currentRouteName();
    }

    public function checkFromRoutes($route)
    {

        $exist = Cache::remember('permission_rooooute2'.$route, 36000, function () use($route) {
           return Permission::whereSlug($route)->first();
                });
                
                
        
   

        if (isset($exist) && !empty($exist)) {

            return true;
        } else {
            return false;
        }
    }

    /* Verifications*/

    public function RouteByRequest($request)
    {
        $uri = $request->capture()->getRequestUri();
        $routed = app('router')->getRoutes()->match(app('request')->create($uri));
        $this->route = $routed->getName();
        return $this->route;
    }



    public function usage_increment($usage){

        $count = $usage->usage_count;
        $usage->update([
            'usage_count' => $count + 1
        ]);

        if ($usage->save()){
            return true;
        }
        else{
            return false;
        }
    }
}
