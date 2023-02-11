<?php

namespace App\View\Components\Form;

use App\View\Components\FormComponent;
use App\View\Components\SelectComponent;
use Illuminate\View\Component;

class Select extends SelectComponent
{

    public function render()
    {
        return view('components.form.select');
    }

}
