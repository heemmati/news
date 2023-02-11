<?php

namespace App\Model\Ticket;

use App\Traits\HasLub;
use App\Traits\HasUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Department extends Model
{
    //
    use HasUser, SoftDeletes, HasLub;
    protected $fillable = [
        'user_id',
        'title',
        'entitle',
        'email',
        'leader',
        'description',
        'status'

    ];


    protected $route_name = 'departments';
    protected $listable = [
        'title' => [],
        'entitle' => [],
        'email' => [],
        'leader' => [],
        'description' => [],
        'status' => []
    ];
    protected $formables = [


        'title' => ['1', 'text'],
        'entitle' => ['1', 'text'],
        'leader' => ['1', 'text'],
        'email' => ['1', 'email'],
        'description' => ['1', 'description'],

    ];

    protected $showables = [
        'title' => ['title'],
        'entitle' => ['title'],
        'email' => ['title'],
        'leader' => ['title'],
        'description' => ['text'],
        'status' => ['status']
    ];

    protected $dates = ['deleted_at'];

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

    protected static function boot()
    {
        parent::boot();


        static::deleting(function ($ticket) {

            foreach ($ticket->tickets as $sub) {
                $sub->delete();
            }

        });


    }
}
