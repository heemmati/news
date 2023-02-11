<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Attachment extends Component
{
    public $name;
    public $namefa;
    public $type;
    public $require;
    public $value;
    public $second;

    public function __construct($name = 'image' , $namefa = 'تصویر' , $type=null , $require=null  , $value =null , $second = null)
    {
        //
        $this->name = $name;
        $this->namefa = $namefa;
        $this->type = $type;
        $this->require = $require;
        $this->value = $value;
        $this->second = $second;
    }

    /**
     * Get the view / view contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        // TODO: Implement render() method.
    }
}
