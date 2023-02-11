<?php

namespace App\View\Components\Site\News;

use Illuminate\View\Component;

class SideNewT1 extends Component
{
    public $news;
    public function __construct($news)
    {
       $this->news = $news;
    }

    public function render()
    {
        return view('components.site.news.side-new-t1');
    }
}
