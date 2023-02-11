<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class Tag extends Component
{

    public $tags;

    public function __construct($tags = null)
    {

        $this->tags = $tags;

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.form.tag');
    }
}
