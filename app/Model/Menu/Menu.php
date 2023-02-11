<?php

namespace App\Model\Menu;

use App\Traits\HasUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model
{
    use SoftDeletes, HasUser;

    protected $fillable = [
        'creator_id',
        'title',
        'description',
        'code',
        'status'
    ];

    protected $dates = ['deleted_at'];


    public function items()
    {
        return $this->hasMany(MenuItem::class, 'menu_id');
    }



}
