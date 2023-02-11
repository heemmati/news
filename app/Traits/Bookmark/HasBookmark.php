<?php


namespace App\Traits\Bookmark;


use App\Model\Bookmark\Bookmark;

trait HasBookmark
{
    public function bookmarks()
    {
        return $this->morphMany(Bookmark::class, 'bookmarkable');
    }

    public function getBookAttribute()
    {
        $bookmarks = Bookmark::where('user_id' , auth()->id())->where('bookmarkable_id' , $this->id )->where('bookmarkable_type' , get_class($this))->first();
        if(isset($bookmarks) && !empty($bookmarks)){
            return 1;
        }
        else{
            return 0;
        }
    }
}
