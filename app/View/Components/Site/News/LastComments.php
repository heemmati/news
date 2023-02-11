<?php

namespace App\View\Components\Site\News;

use Illuminate\View\Component;

class LastComments extends Component
{
    public $comments;

    public function __construct($comments)
    {
        $this->comments = $comments;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.site.news.last-comments');
    }
}
