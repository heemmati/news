<?php

namespace App\View\Components\Site\Tools;

use Illuminate\View\Component;

class Image extends Component
{
    public $image;
    public $class;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($image ,$class =null)
    {
        //
        $this->image = $image;
        $this->class = $class;

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.site.tools.image');
    }
}
