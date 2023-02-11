<?php

namespace App\View\Components\Site\Tools;

use Illuminate\View\Component;

class Breadcrumb extends Component
{
    public $title;
    public $image;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title ,  $image =null)
    {
        //
        $this->title = $title;
        $this->image = $image;

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.site.tools.breadcrumb');
    }
}
