<?php

namespace App\View\Components\Site\Variable;

use Illuminate\View\Component;

class Service extends Component
{

    public $services;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($services)
    {
        //

        $this->services = $services;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.site.variable.service');
    }
}
