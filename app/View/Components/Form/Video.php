<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class Video extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $type , $name , $require , $namefa;

    public function __construct($type , $name = null , $require =null , $namefa = null)
    {
        $this->type = $type;
        $this->name = $name;
        $this->require = $require;
        $this->namefa = $namefa;

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.form.video');
    }
}
