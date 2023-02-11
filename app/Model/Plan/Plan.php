<?php

namespace App\Model\Plan;

use App\Model\Role;
use App\Traits\HasLub;
use App\User;
use App\Utility\Lang;
use App\Utility\Status;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Shop\Traits\HasOtherPayment;
use const App\Traits\USER;

class Plan extends Model
{
    //
    use HasLub;
    use SoftDeletes;
    use HasOtherPayment;

    protected $fillable = [
        'role_id',
        'title',
        'entitle',
        'lang',
        'description',
        'plan_type',
        'body',
        'image',
        'icon',
        'price',
        'status',
    ];

    protected $route_name = 'plans';
    protected $listable = [
        'title' => [],
        'price' => [],
        'role_id' => ['role'],
        'image' => [],
        'status' => [],
        'haveItem' => ['plots'],

    ];
    protected $formables = [
        'title' => ['1', 'text'],
        'entitle' => ['0', 'text'],
        'role_id' => ['1', 'select', Role::class],
        'lang' => ['1', 'utility', Lang::class],
        'plan_type' => ['1', 'utility', \Modules\Plan\Utility\Plan::class],
        'description' => ['1', 'description'],
        'body' => ['1', 'body'],
        'image' => ['1', 'image'],
        'icon' => ['1', 'image'],
        'price' => ['1', 'number'],
         'status'=> [ '0' , 'utility' , Status::class],

    ];
    protected $showables = [
        'title' => ['title'],
        'entitle' => ['title'],
        'role_id' => ['select' , Role::class ],
        'lang' => ['utility', Lang::class],
        'description' => ['text'],
        'body' => ['body'],
        'price' => ['text'],
        'icon' => ['text'],
        'image' => ['image'],
        'status' => ['status']
    ];

    protected $dates = ['deleted_at'];

    public function role(){
        return $this->belongsTo(Role::class);
    }

    public function plots(){
        return $this->hasMany(Plot::class);
    }
    public function users(){
        return $this->hasMany(UserRolePlan::class  , 'plan_id' );
    }

    protected static function boot()
    {
        parent::boot();


        static::deleted(function ($plan) {
            foreach ($plan->plots as $sub) {
                $sub->delete();
            }
            foreach ($plan->users as $sub) {
                $sub->delete();
            }


        });


    }


}

