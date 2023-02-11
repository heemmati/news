<?php

namespace App\View\Components\Site\Tools;

use Illuminate\View\Component;

class MetaPost extends Component
{
    public $username;
    public $date;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($username , $date)
    {
        //
        $this->username = $username;
        $this->date = $date;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.site.tools.meta-post');
    }
}
