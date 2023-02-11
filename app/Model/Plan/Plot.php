<?php

namespace App\Model\Plan;

use App\Model\Permission;
use App\Traits\HasLub;
use Illuminate\Database\Eloquent\Model;

class Plot extends Model
{
    //
    use HasLub;

    protected $fillable = [
        'plan_id',
        'permission_id',
        'end_date',
        'limit_count',
    ];

    protected $route_name = 'plots';
    protected $parentables = 'plan_id';
    protected $listable = [
        'plan_id' => ['plan'],
        'permission_id' => ['permission'],
        'end_date' => [],
        'limit_count' => [],

    ];
    protected $formables = [
        'plan_id' => ['1', 'hidden'],

        'permission_id' => ['1', 'select', Permission::class],
        'end_date' => ['1', 'date'],
        'limit_count' => ['1', 'number'],


    ];
    protected $showables = [

        'plan_id' => ['select', Plan::class],
        'permission_id' => ['select', Permission::class],
        'end_date' => ['title'],
        'limit_count' => ['title'],

    ];


    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }

    public function permission()
    {
        return $this->belongsTo(Permission::class);
    }

    protected $dates = ['deleted_at'];
}
