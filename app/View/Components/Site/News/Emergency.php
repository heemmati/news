<?php

namespace App\View\Components\Site\News;

use Illuminate\View\Component;

class Emergency extends Component
{
    public $emergencies;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($emergencies)
    {
        $this->emergencies = $emergencies;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.site.news.emergency');
    }
}
