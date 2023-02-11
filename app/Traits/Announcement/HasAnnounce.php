<?php


namespace App\Traits\Announcement;


use App\Model\Announcement\Announcement;

trait HasAnnounce
{
    public function announcements()
    {
        return $this->morphToMany(Announcement::class, 'announcementable');
    }
}
