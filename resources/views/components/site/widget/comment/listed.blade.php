<ul>

    @foreach($comments as $comment)
        <li>
            <x-site.widget.comment.list-item :reply="$reply"  :comment="$comment"></x-site.widget.comment.list-item>

            @if(isset($comment->children) && !empty($comment->children)  && count($comment->children) > 0)
                <x-site.widget.comment.listed :comments="$comment->children"  reply="1"></x-site.widget.comment.listed>
            @endif


        </li>
    @endforeach

</ul>
