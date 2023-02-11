<?php

namespace App\View\Components\Site\News;

use Illuminate\View\Component;

class CommentsReview extends Component
{

    public $comments;

    public function __construct($comments)
    {
        $this->comments = $comments;
    }


    public function render()
    {
        return view('components.site.news.comments-review');
    }
}
