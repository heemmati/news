<?php


namespace App\Traits;


use App\Scopes\OwnerScope;
use App\User;
use App\Utility\Acl;

trait HasUser
{
    protected static function boot()
    {
        parent::boot();

//        static::addGlobalScope(new OwnerScope());


    }

    public function user()
    {
        if (isset($this->creator_id) && !empty($this->creator_id)){

            return $this->belongsTo(User::class , 'creator_id' , 'id');
        }
        else{
            return $this->belongsTo(User::class , 'user_id' , 'id');
        }

    }

    public function scopeOwner($query, $user_id)
    {

        if (!Acl::isManager($user_id)) {

            return $query->where('user_id', $user_id);
        }


    }

    public function scopeOwnerArticle($query, $user_id)
    {

        if (!Acl::isManager($user_id)) {

            return $query->where('creator_id', $user_id);
        }


    }

    public function scopeOwnerAll($query, $user_id)
    {
        return $query->where('user_id', $user_id);
    }


}
