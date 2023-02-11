<?php

namespace App\View\Components;

use Illuminate\View\Component;

class StatusShow extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $status;
    public $model;

    public function __construct($status , $model = null)
    {
        //

        $this->status = $status;
        $this->model = $model;

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.status-show');
    }
}
