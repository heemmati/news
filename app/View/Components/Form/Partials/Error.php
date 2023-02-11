<?php

namespace App\View\Components\Form\Partials;

use Illuminate\View\Component;

class Error extends Component
{
    protected $name;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name = null)
    {
        //
        $this->name = $name;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.form.partials.error');
    }
}
