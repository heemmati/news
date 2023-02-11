<div class="comment-box">
    <div class="user">
        <i class="far fa-user"></i>
        <span class="username">
                                           {{ $comment->name }}
                                        </span>
    </div>
    <div class="comment-body">
        <p>{{ $comment->body }}</p>
    </div>
    <div class="comment-details">
        <div class="date">
            <p>{{ $comment->timeHandler() }}</p>
        </div>
        <div class="reply">
            <i class="fa fa-reply"></i>
            <a href="javascript:void(0)" class="reply_this" data-parent="{{ $comment->id }}">
                پاسخ دادن
            </a>
        </div>
    </div>
</div>
