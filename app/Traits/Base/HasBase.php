<?php


namespace App\Traits\Base;


use App\Traits\HasSlug;
use App\Model\Base\Base;

trait HasBase
{


    public function base()
    {
       return $this->morphOne(Base::class , 'baseable');
    }


    public function getTitleAttribute()
    {

        if (isset($this->base) && !empty($this->base)){
            return $this->base->title;
        }

    }


    public function getShortAttribute()
    {

        if (isset($this->base) && !empty($this->base)){
            return $this->base->short;
        }

    }

    public function getSlugAttribute()
    {

        if (isset($this->base) && !empty($this->base)){
            return $this->base->slug;
        }

    }


    public function getEnTitleAttribute()
    {

        if (isset($this->base) && !empty($this->base)){
            return $this->base->entitle;
        }


    }

    public function getDescriptionAttribute()
    {
        if (isset($this->base) && !empty($this->base)){
            return $this->base->description;
        }

    }

    public function getBodyAttribute()
    {

        if (isset($this->base) && !empty($this->base)){
            return $this->base->body;
        }
    }

    public function getImageAttribute()
    {
        if (isset($this->base) && !empty($this->base)){
            return $this->base->image;
        }
    }


    public function path()
    {
        return url('/'.$this->slug);
    }

}
