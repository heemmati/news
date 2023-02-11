<?php


namespace App\View\Components;


use Illuminate\View\Component;

class FormComponent extends Component
{
    public $type , $name , $require , $namefa , $value , $kind;

    public function __construct($type , $name = null , $require =null , $namefa = null , $value = null , $kind = null)
    {


        $this->type = $type;
        $this->name = $name;
        $this->require = $require;
        $this->namefa = $namefa;
        $this->value = $value;
        $this->kind = $kind;

    }

    public function render()
    {
        // TODO: Implement render() method.
    }
}
