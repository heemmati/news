<?php

namespace App\Model\Announcement;


use App\Events\sendEmailAnnounce;
use App\Model\Article;
use App\Traits\HasLub;
use App\Traits\HasUser;
use App\User;
use App\Utility\Lang;
use App\Utility\Status;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Model\Club\Club;

class Announcement extends Model
{
    use HasUser, HasLub , SoftDeletes;

    protected $fillable = [
        'user_id',
        'title',
        'lang',
        'body',
        'status'

    ];
    protected $route_name = 'annonucements';
    protected $listable = [
        'title' => [],
        'lang' => [],
        'status' => []

    ];

    protected $formables = [
        'title' => ['1', 'text'],
        'lang' => ['1', 'utility', Lang::class],
        'body' => ['1', 'body'],
        'status' => ['0', 'utility', Status::class],

    ];
//    protected $showables = [
//        'title' => ['title'],
//        'lang' => ['utility', Lang::class],
//        'body' => ['body'],
//        'status' => ['status']
//    ];

    protected $viewable = ['announcement::show'];

    public function clubs()
    {
        return $this->morphedByMany(Club::class, 'announcementable');
    }
    public function users(){

        return $this->morphedByMany(User::class, 'announcementable');
    }


//    public function users()
//    {
//        return $this->morphedByMany(User::class, 'announcementable');
//    }
    protected $events = [
        'clubs' => [ '1' , 'multiselect' , Club::class , 'users']
    ];
    protected $evenins = [
        sendEmailAnnounce::class
    ];

    protected $dates = ['deleted_at'];



    protected static function boot()
    {
        parent::boot();


        static::deleted(function ($announce) {
            $announce->users()->detach();
            $announce->clubs()->detach();

        });


    }



}
