<div class="opinions" id="comments">
    <div class="opinions-title">
        <i class="fa fa-comment"></i>
        <h2>
            نظر شما
        </h2>
    </div>
    <div class="opinions-form">
        <form action="{{ route('site.comment.save') }}" method="POST">
            @csrf

            <input type="hidden" name="parent" id="parent_change" value="0">
            <input type="hidden" name="commentable_type"  value="{{ get_class($object) }}">
            <input type="hidden" name="commentable_id"  value="{{ $object->id }}">




            <label>نام</label><br>
            <input type="text" name="name" placeholder="نام" value-name="name"><br>
            <label>ایمیل</label><br>
            <input type="email" name="email" placeholder="ایمیل" value-name="email"><br>
            <label>نظر شما</label><br>
            <textarea class="form-control" name="body" id="inputMassage" rows="5"
                      placeholder="نظر شما"></textarea>
            <button type="submit" class="btn-upper btn-sm btn checkout-page-button">ارسال
            </button>
        </form>
    </div>
</div>
<div class="comments">
    <div class="comments-title">
        <i class="fa fa-comments"></i>
        <h2>
            نظرات
        </h2>
    </div>

    @foreach($comments as $comment)
            @include('site.inc.comment-box' , ['comment' => $comment])
    @endforeach
</div>
