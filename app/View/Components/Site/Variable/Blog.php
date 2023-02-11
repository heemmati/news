<?php

namespace App\View\Components\Site\Variable;

use Illuminate\View\Component;

class Blog extends Component
{
    public $articles;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($articles)
    {
        //
        $this->articles = $articles;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.site.variable.blog');
    }
}
