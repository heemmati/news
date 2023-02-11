<?php


namespace App\Traits\File;


use App\Model\File\File;


trait HasFile
{
    public function files()
    {
        return $this->morphToMany(File::class, 'fileable');
    }
}

