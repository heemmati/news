<?php


namespace App\Traits\Category;

use App\Model\Category\Category;

trait HasParent
{

    public function children()
    {
        return $this->hasMany(Category::class , 'parent_id');
    }

    public function parent()
    {
        return $this->belongsTo(Category::class , 'parent_id');
    }

    public function getFatherAttribute()
    {
        if (isset($this->parent) && !empty($this->parent)){
            return $this->parent->title;
        }

    }


}
