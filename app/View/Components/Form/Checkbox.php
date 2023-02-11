<?php

namespace App\View\Components\Form;

use App\View\Components\FormComponent;
use Illuminate\View\Component;

class Checkbox extends FormComponent
{

    public function render()
    {
        return view('components.form.checkbox');
    }
}
