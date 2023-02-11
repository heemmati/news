<?php

namespace App\Model;

use App\Traits\HasLub;
use App\Traits\HasUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Model\Shop\Product;

class Favoriote extends Model
{
    //
    use SoftDeletes , HasUser , HasLub;
    protected $fillable = [
        'user_id' ,
        'favorioteable_id' ,
        'favorioteable_type' ,
        'status' ,
    ];
    protected $route_name = 'favoriotes' ;
    protected $listable = [
        'user_id' => [] ,

        'status' => []

    ];
    public function favorioteable(){
        return $this->morphTo();
    }


    public function product()
    {

       if ($this->favorioteable_type == Product::class){
           $product = Product::where('id' , $this->favorioteable_id)->first();
           return $product;
       }
    }



    protected $dates = ['deleted_at'];
}
