<?php

namespace App\View\Components\Site\Variable;

use Illuminate\View\Component;

class Hero extends Component
{
    public $image;
    public $title;
    public $head_title;
    public $description;
    public $link;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($image , $title , $head_title , $description , $link)
    {
        $this->image = $image;
        $this->title = $title;
        $this->head_title = $head_title;
        $this->description = $description;
        $this->link = $link;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.site.variable.hero');
    }
}
