<?php


namespace App\Traits\Podcast;


trait PodcastHelper
{
    public function attach_podcasts($object , $podcast_array)
    {

        if (isset($podcast_array) && !empty($podcast_array) && count($podcast_array) > 0){
            $object->podcasts()->sync($podcast_array);
        }

    }
}
