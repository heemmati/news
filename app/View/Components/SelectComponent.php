<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SelectComponent extends Component
{
    public $items;
    public $id;
    public $type , $name , $require , $namefa , $value , $multiple;



    public function __construct($type = null  ,
                                $name = null ,
                                $require =null , $namefa = null , $value = null , $items = null , $multiple = null , $id = null)
    {

        $this->type = $type;
        $this->name = $name;
        $this->require = $require;
        $this->namefa = $namefa;
        $this->value = $value;
        $this->items = $items;
        $this->multiple = $multiple;
        $this->id = $id;


    }


    /**
     * Get the view / view contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {

    }
}
