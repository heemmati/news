<?php


namespace App\Traits\Category;

use App\Model\Category\Category;

trait HasCategory
{

    public function categories()
    {
        return $this->morphToMany(Category::class, 'categoriable');
    }



}
