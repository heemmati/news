<?php

namespace App\View\Components\Site\News;

use Illuminate\View\Component;

class Comments extends Component
{

    public $comments;
    public $object;
    public function __construct($object , $comments = null )
    {
        $this->comments = $comments;
        $this->object = $object;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.site.news.comments');
    }
}
