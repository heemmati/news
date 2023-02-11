<?php

namespace App\View\Components\Site\Widget;

use Illuminate\View\Component;

class Recent extends Component
{
    public $recent;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($recent)
    {
        //
        $this->recent = $recent;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.site.widget.recent');
    }
}
