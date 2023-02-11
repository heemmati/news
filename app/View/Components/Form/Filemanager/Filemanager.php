<?php

namespace App\View\Components\Form\Filemanager;

use Illuminate\View\Component;

class Filemanager extends Component
{

    public $object;

    public function __construct($object = null)
    {
        $this->object = $object;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.form.filemanager.filemanager');
    }
}
