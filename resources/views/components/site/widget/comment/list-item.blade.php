<div class="single-commentor-user {{ $reply ? 'rlp' : '' }}" >
    @if(isset($comment->user->avatar) && !empty($comment->user->avatar))
        <img src="{{ \Illuminate\Support\Facades\Storage::url($comment->user->avatar )}}"
             alt="thumb">
    @else
        <img src="{{ url('site-theme') }}/assets/img/singlepost/user-1.png"
             alt="thumb">
    @endif
    <div class="single-commentor-user-bio">
        <div class="single-commentor-user-bio-head">
            <h6>
                {{ $comment->name }}
                <span> {{ $comment->timeHandler() }}</span></h6>
            <a href="javascript:void(0)" class="reply_this" data-parent="{{ $comment->id }}"><i class="fas fa-reply-all"></i>پاسخ </a>
        </div>
        <p>
            {{ $comment->body }}
        </p>
    </div>
</div>
