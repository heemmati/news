<?php

namespace App\View\Components\Site\News;

use Illuminate\View\Component;

class NewsListT2 extends Component
{
    public $details;

    public function __construct($details)
    {
        $this->details = $details;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.site.news.news-list-t2');
    }
}
