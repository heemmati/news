<?php

namespace App\View\Components\site\widget\comment;

use Illuminate\View\Component;

class comment extends Component
{
    public $comments;
    public $id;
    public $type;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($comments = null , $id , $type)
    {
        //
        $this->comments = $comments;
        $this->id = $id;
        $this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.site.widget.comment.comment');
    }
}
