<?php

namespace App\View\Components\basic;

use Illuminate\View\Component;

class menu extends Component
{
    public $lists;

    public function __construct($lists)
    {
        $this->lists = $lists;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.basic.menu');
    }
}
