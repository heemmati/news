<?php

namespace App;

use App\Model\Faq;
use App\Model\Favoriote;


use App\Http\Controllers\Admin\Image;
use App\Model\LegalPerson;
use App\Model\Marketer;

use App\Model\Newsletter;
use App\Model\Page;
use App\Model\RealPerson;

use App\Model\Tag;
use App\Model\Comment\Comment;
use App\Model\Video;
use App\Traits\HasLub;
use App\Traits\HasPermission;
use App\Utility\Acl;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Model\Basket\Basket;
use App\Traits\Announcement\HasAnnounce;
use App\Model\Club\Club;
use App\Model\News\Article;
use App\Model\Plan\Usage;
use App\Model\Plan\UserRolePlan;
use App\Traits\Image\HasImage;
use App\Model\User\Certificate;
use App\Model\User\CutCo;
use App\Traits\User\SetFollow;
use App\Traits\User\SetUserDetails;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes, HasPermission, HasAnnounce, HasLub  , HasImage ;

    use SetUserDetails , SetFollow;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'name',
        'username',
        'role',
        'email',
        'mobile',
        'avatar',
        'google_id',
        'parent_id',
        'account_verification',
        'password'
    ];


    protected $dates = ['deleted_at'];
    protected $route_name = ['users'];

    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected static function boot()
    {
        parent::boot();


        static::deleting(function ($user) {

            $user->details()->delete();
            $user->certificate()->delete();
            $user->cutco()->delete();

            foreach ($user->articles as $sub) {
                $sub->delete();
            }


            foreach ($user->usages as $sub) {
                $sub->delete();
            }

            foreach ($user->plans as $sub) {
                $sub->delete();
            }

            foreach ($user->clubs as $sub) {
                $sub->delete();
            }


            foreach ($user->comments as $sub) {
                $sub->delete();
            }

            foreach ($user->faqs as $sub) {
                $sub->delete();
            }



//            foreach ($user->newsletters as $sub) {
//                $sub->delete();
//            }
            foreach ($user->pages as $sub) {
                $sub->delete();
            }

            foreach ($user->videos as $sub) {
                $sub->delete();
            }



            // foreach ($user->menus as $sub) {
            //     $sub->delete();
            // }


            // foreach ($user->generals as $sub) {
            //     $sub->delete();
            // }


            foreach ($user->tags as $sub) {
                $sub->delete();
            }
            foreach ($user->images as $sub) {
                $sub->delete();
            }

//            foreach ($user->files as $sub) {
//                $sub->delete();
//            }


            foreach ($user->favoriotes as $sub) {
                $sub->delete();
            }

        });


    }

    public function articles()
    {
        return $this->hasMany(Article::class , 'id' , 'creator_id');
    }





    public function favoriotes()
    {
        return $this->hasMany(Favoriote::class, 'id' , 'creator_id');
    }





    public function files()
    {
        return $this->hasMany(File::class);
    }


    public function tags()
    {
        return $this->hasMany(Tag::class , 'id' , 'creator_id');
    }

    public function generals()
    {
        return $this->hasMany(General::class);
    }

    public function menus()
    {
        return $this->hasMany(Menu::class);
    }


    public function sliders()
    {
        return $this->hasMany(Slider::class);
    }

    public function videos()
    {
        return $this->hasMany(Video::class);
    }

    public function pages()
    {
        return $this->hasMany(Page::class, 'id' , 'creator_id');
    }



    public function newsletters()
    {
        return $this->hasMany(Newsletter::class);
    }

    public function faqs()
    {
        return $this->hasMany(Faq::class, 'id' , 'creator_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function clubs()
    {
        return $this->belongsToMany(Club::class, 'user_club', 'user_id');
    }

    public function plans()
    {
        return $this->hasMany(UserRolePlan::class, 'user_id');
    }

    public function usages()
    {
        return $this->hasMany(Usage::class, 'user_id');
    }

    public function bankinfos()
    {
        return $this->hasMany(BankInfo::class, 'user_id');
    }


    public function children()
    {
        return $this->hasMany(User::class, 'parent_id', 'id');
    }

    public function parent()
    {
        return $this->belongsTo(User::class, 'parent_id', 'id');
    }

    public function cutco()
    {
        return $this->hasOne(CutCo::class);
    }

    public function certificate()
    {
        return $this->hasOne(Certificate::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function abstracts()
    {
        return $this->hasMany(AbstractProduct::class);
    }

    public function sub_buy($start, $end)
    {
        return $this->marketers()
            ->where('created_at', '>', $start)
            ->where('created_at', '<', $end)
            ->where('type', \App\Utility\Marketer::SUBSETBUY)
            ->sum('value');
    }

    public function marketers()
    {
        return $this->hasMany(Marketer::class);
    }

    public function sell($start, $end)
    {
        return $this->marketers()
            ->where('created_at', '>', $start)
            ->where('created_at', '<', $end)
            ->where('type', \App\Utility\Marketer::SELL)
            ->sum('value');
    }

    public function buy($start, $end)
    {
        return $this->marketers()
            ->where('created_at', '>', $start)
            ->where('created_at', '<', $end)
            ->where('type', \App\Utility\Marketer::BUY)
            ->sum('value');
    }

    public function sub_sell($start, $end)
    {
        return $this->marketers()
            ->where('created_at', '>', $start)
            ->where('created_at', '<', $end)
            ->where('type', \App\Utility\Marketer::SUBSETSELL)
            ->sum('value');
    }



    public function basket()
    {
        return $this->hasMany(Basket::class);
    }

    public function is_located_here($id)
    {
        $address = $this->addresses()->oldest()->first();
        if (isset($address) && !empty($address)) {
            if ($address->city_id == $id) {

                return $this->id;
            } else {
                return false;
            }
        } else {
            return false;
        }

    }



}
