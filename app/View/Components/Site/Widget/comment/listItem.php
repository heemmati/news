<?php

namespace App\View\Components\site\widget\comment;

use Illuminate\View\Component;

class listItem extends Component
{
    public $reply;
    public $comment;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($comment = null , $reply =null)
    {
        //
        $this->reply = $reply;
        $this->comment = $comment;


    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.site.widget.comment.list-item');
    }
}
