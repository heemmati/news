<?php


namespace App\Traits\Video;


trait VideoHelper
{
    public function attach_videos($object , $video_array)
    {
        if (isset($video_array) && !empty($video_array) && count($video_array) > 0){
        $object->videos()->sync($video_array);
            }
    }
}
