<?php

namespace App\View\Components\Form\Partials;

use Illuminate\View\Component;

class Label extends Component
{
    public $namefa;
    public $type;
    public $important;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($namefa = null, $type = null , $important = null)
    {
        $this->namefa = $namefa;
        $this->type = $type;
        $this->important = $important;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.form.partials.label');
    }
}
