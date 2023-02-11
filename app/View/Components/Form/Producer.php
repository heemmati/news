<?php

namespace App\View\Components\Form;

use App\View\Components\FormComponent;
use App\View\Components\SelectComponent;
use Illuminate\View\Component;

class Producer extends Component
{


    public $items;
    public $id;
    public $type , $name , $require , $namefa , $value , $value2 , $multiple;



    public function __construct($type = null  ,
                                $name = null ,
                                $value2 = null ,
                                $require =null , $namefa = null , $value = null , $items = null , $multiple = null , $id = null)
    {

        $this->type = $type;
        $this->name = $name;
        $this->value2 = $value2;
        $this->require = $require;
        $this->namefa = $namefa;
        $this->value = $value;
        $this->items = $items;
        $this->multiple = $multiple;
        $this->id = $id;
        


    }


    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.form.producer');
    }
}
