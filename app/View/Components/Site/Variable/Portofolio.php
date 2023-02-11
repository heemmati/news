<?php

namespace App\View\Components\Site\Variable;

use Illuminate\View\Component;

class Portofolio extends Component
{
    public $portofolios;
    public $categories;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($portofolios , $categories)
    {
        $this->portofolios = $portofolios;
        $this->categories = $categories;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.site.variable.portofolio');
    }
}
