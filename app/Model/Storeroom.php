<?php

namespace App\Model;

use App\Traits\HasLub;
use App\Traits\HasUser;
use App\Utility\Lang;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Model\Shop\AbstractProduct;

class Storeroom extends Model
{
    //
    use HasUser , HasLub ,  SoftDeletes;

    protected $fillable = [
        'user_id' ,
        'title' ,
        'entitle' ,
        'description' ,
        'lang' ,
        'address' ,
        'phone' ,
        'manager' ,
        'manager_email' ,
        'longitude',
        'latitude',
        'postalcode',
        'unit',
        'plaque',
        'productCount',
        'status'
    ];
    protected $route_name = 'storerooms' ;
    protected $listable = [
        'title'=> [] ,
        'address'=> [] ,
        'phone'=> [],
        'status'=> []

    ];
    protected $formables = [
        'title' => ['1' , 'text'] ,
        'entitle' => ['1' , 'text'] ,
        'lang' => ['1', 'utility', Lang::class],
        'description' => ['0' , 'description'] ,
        'address' => ['0' , 'description'] ,

        'longitude'=> ['1', 'map'],
        'latitude'=> ['1', 'hidden'],

        'postalcode'=> ['1', 'number'],
                'plaque'=> ['1', 'text'],
        'unit'=> ['0', 'number'],


        'phone' => ['0' , 'number'] ,
        'manager' => ['1' , 'text'] ,
        'manager_email' => ['1' , 'text'] ,


    ];

    protected $showables = [
        'title' => ['title'],
        'entitle' => ['title'],
        'lang' => ['utility', Lang::class],
        'description' => ['text'],
        'address' => ['text'],
         'postalcode' => ['title'],
         'plaque' => ['title'],
         'unit' => ['title'],
         'manager' => ['title'],
         'manager_email' => ['title'],
        'image' => ['image'],
        'status' => ['status'] ,


    ];

    public function abstracts()
    {
        return $this->hasMany(AbstractProduct::class , 'store_id');
    }


    protected $dates = ['deleted_at'];

    public function path(){
        return config('app.locale').'/panel/store/detail/'.$this->id;
    }


    protected static function boot()
    {
        parent::boot();


        static::deleting(function ($storeroom) {


            foreach ($storeroom->abstracts as $sub) {
                $sub->delete();
            }


      });


    }



}
