<?php

namespace App\Traits\Theme;

use App\Model\Theme\Theme;

trait HasTheme
{
    public function themes()
    {
        return $this->morphToMany(Theme::class, 'themeable');
    }
}
