<?php

namespace App\View\Components\Site\News;

use Illuminate\View\Component;

class BigNewsItem extends Component
{
    public $new;
    public function __construct($new)
    {
        $this->new = $new;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.site.news.big-news-item');
    }
}
