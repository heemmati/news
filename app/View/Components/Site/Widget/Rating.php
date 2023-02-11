<?php

namespace App\View\Components\Site\Widget;

use Illuminate\View\Component;

class Rating extends Component
{

    public $id;
    public $type;
    public $value;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($id = null , $type = null , $value = null)
    {
       $this->id = $id;
       $this->type = $type;
       $this->value = $value;

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.site.widget.rating');
    }
}
