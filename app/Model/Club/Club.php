<?php

namespace App\Model\Club;

use App\Traits\HasLub;
use App\Traits\HasUser;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Announcement\HasAnnounce;

class Club extends Model
{
    //
    use HasUser, SoftDeletes, HasLub , HasAnnounce;
    protected $fillable = [
        'user_id',
        'title',
        'entitle',
        'description',
        'status'
    ];


    protected $route_name = 'clubs';
    protected $listable = [
        'title' => [],
        'entitle' => [],
        'description' => [],
        'status' => [],


    ];
    protected $formables = [
        'title' => ['1', 'text'],
        'entitle' => ['1', 'text'],
        'description' => ['1', 'description']
    ];
    protected $showables = [
        'title' => ['text'],
        'entitle' => [ 'text'],
        'description' => [ 'description']
    ];
    protected $viewable = ['club::show' , 'club'];

    protected $events = [
        'users' => ['1', 'multiselect', User::class]
    ];
    protected $dates = ['deleted_at'];

    protected static function boot()
    {
        parent::boot();

        static::deleted(function ($club) {
            $club->users()->sync([]);
        });


    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_club', 'club_id');

    }



}
