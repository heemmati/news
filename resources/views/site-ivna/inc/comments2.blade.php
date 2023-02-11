<div class="opinion-exchange" id="opinion">
    <div class="opinion-title">
        <i class="fa fa-circle"></i>
        <h2>
            تبادل نظر
        </h2>
    </div>
    <form action="{{ route('site.comment.save') }}" method="POST">
        @csrf



        <input type="hidden" name="parent" id="parent_change" value="0">
        <input type="hidden" name="commentable_type"  value="{{ get_class($object) }}">
        <input type="hidden" name="commentable_id"  value="{{ $object->id }}">




        <div class="row">
            <div class="col-md-6">
                <label>نام و نام خانوادگی</label>
                <input type="text" class="form-control" name="name" placeholder="نام" value-name="name"><br>


            </div>
            <div class="col-md-6">
                <label>ایمیل</label>
                <input type="email" class="form-control" name="email" placeholder="ایمیل" value-name="email"><br>
            </div>
        </div>
        <label>متن پیام</label>
        <textarea class="form-control" name="body" id="inputMassage" rows="5"
                  placeholder="نظر شما"></textarea>

        <button type="submit" class="btn-upper btn-sm btn checkout-page-button">ارسال نظر</button>
    </form>
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
