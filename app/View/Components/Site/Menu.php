<?php

namespace App\View\Components\Site;

use Illuminate\View\Component;

class Menu extends Component
{
    public $items;
    public function __construct($items = null)
    {
        $this->items = $items;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.site.menu');
    }
}
