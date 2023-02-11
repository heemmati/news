<?php

namespace App\View\Components\Site\Widget;

use Illuminate\View\Component;

class Like extends Component
{
    public $id;
    public $type;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($id =null , $type =null)
    {
     $this->id = $id;
     $this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.site.widget.like');
    }
}
