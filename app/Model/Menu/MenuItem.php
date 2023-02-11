<?php

namespace App\Model\Menu;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MenuItem extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'creator_id',
        'menu_id',
        'title',
        'link',
        'description',
        'place',
        'parent_id',
        'icon',
        'status'
    ];

    protected $dates = ['deleted_at'];

    public function menu()
    {
        return $this->belongsTo(Menu::class , 'menu_id');
    }

    public function children()
    {
        return $this->hasMany(MenuItem::class , 'parent_id');
    }

    public function parent()
    {
        return $this->belongsTo(Menu::class , 'parent_id');
    }

}
