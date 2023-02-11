<?php

namespace App\View\Components\site\widget\comment;

use Illuminate\View\Component;

class listed extends Component
{

    public $reply;
    public $comments;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($comments = null , $reply = null)
    {
        //
        $this->reply = $reply;
        $this->comments = $comments;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.site.widget.comment.listed');
    }
}
