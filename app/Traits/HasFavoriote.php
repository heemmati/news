<?php


namespace App\Traits;


use App\Model\Favoriote;
use App\Http\Controllers\Admin\Image;

trait HasFavoriote
{
    public function favoriotes()
    {
        return $this->morphMany(Favoriote::class , 'favorioteable');
    }
}
