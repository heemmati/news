<?php

namespace App\View\Components\Site\News;

use Illuminate\View\Component;

class SpecificNews extends Component
{
    public $news;

    public function __construct($news)
    {
        $this->news = $news;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.site.news.specific-news');
    }
}
