<?php

namespace App\View\Components\Admin\Partials;

use Illuminate\View\Component;

class PageHeader extends Component
{


    public $breadcrumbs;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($breadcrumbs)
    {
        //

        $this->breadcrumbs = $breadcrumbs;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.admin.partials.page-header');
    }
}
