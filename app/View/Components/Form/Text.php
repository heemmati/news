<?php

namespace App\View\Components\Form;

use App\View\Components\FormComponent;
use Illuminate\View\Component;

class Text extends FormComponent
{

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.form.text');
    }
}
