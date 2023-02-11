<?php


namespace App\Traits\Podcast;


use App\Model\Gallery\Gallery;
use App\Model\Podcast\Podcast;

trait HasPodcast
{

    public function podcasts()
    {
        return $this->morphToMany(Podcast::class, 'podcastable');
    }
}
