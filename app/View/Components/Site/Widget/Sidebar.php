<?php

namespace App\View\Components\Site\Widget;

use Illuminate\View\Component;

class Sidebar extends Component
{
    public $recent;
    public $categories;
    public $tags;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($tags , $categories , $recent)
    {
        //
        $this->tags = $tags;
        $this->categories = $categories;
        $this->recent = $recent;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.site.widget.sidebar');
    }
}
