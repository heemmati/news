<?php

namespace App\View\Components\Site\News;

use Illuminate\View\Component;

class TitleH2 extends Component
{
    public $path;
    public $title;

    public function __construct($title , $path)
    {
       $this->path = $path;
       $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.site.news.title-h2');
    }
}
