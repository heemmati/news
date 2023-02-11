<?php

namespace App\View\Components\basic;

use Illuminate\View\Component;

class ulist extends Component
{

    public $lists;


    public function __construct($lists)
    {
        $this->lists = $lists;
    }



    public function render()
    {
        return view('components.basic.ulist');
    }
}
