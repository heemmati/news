<?php


namespace App\Traits\Rating;


use App\Model\Rating\Rating;

trait HasRating
{
    public function ratings()
    {
        return $this->morphMany(Rating::class, 'ratingable');
    }

    public function getRateAttribute()
    {

        $ratings = $this->ratings()->pluck('value')->toArray();

        if (isset($ratings) && !empty($ratings) && count($ratings) > 0){
            return array_sum($ratings) / count($ratings) ;
        } else{
            return 0;
        }


    }




}
