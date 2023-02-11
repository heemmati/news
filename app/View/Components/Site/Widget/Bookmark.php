<?php

namespace App\View\Components\Site\Widget;

use Illuminate\View\Component;

class Bookmark extends Component
{

    public $booked;
    public $id;
    public $type;
    public function __construct($booked = null , $id = null , $type = null)
    {
        $this->booked = $booked;
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
        return view('components.site.widget.bookmark');
    }
}
