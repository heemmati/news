<br>
<div class="row">
    @if(isset($comments) && !empty($comments) && count($comments) > 0)
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="review-area mt-50 ptb-70 border-top">
                <div class="post-title mb-40">
                    <h2 class="h6 inline-block">
                        {{ count($comments) }}
                        دیدگاه

                    </h2>
                </div>
                <div class="review-wrap">
                    <div class="review-inner">
    <x-site.news.comments-review :comments="$comments"></x-site.news.comments-review>

                    </div>
                </div>
            </div>
        </div>
    @endif

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <br>
        <div class="comment-form-area">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <h3 class="text-primary">نظر شما</h3>
                    </div>
                </div>
            </div>

            <div class="form-wrap">
                <form action="{{ route('site.comment.save') }}" method="POST" id="comment_form">
                    @csrf

                    <input type="hidden" name="commentable_id" value="{{ $object->id }}">
                    <input type="hidden" name="commentable_type" value="{{ get_class($object) }}">

                    <input type="hidden" id="parent_change" name="parent_id" value="0">


                    @if(\Illuminate\Support\Facades\Auth::guest())
                        <div class="col-md-12">


                            <div class="form-group">
                                <input type="text" name="name" class="form-control"
                                       placeholder="نام و نام خانوادگی خود را وارد کنید">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="email" name="email" class="form-control"
                                       placeholder="ایمیل خود را وارد کنید">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="number" name="mobile" class="form-control"
                                       placeholder="شماره همراه  خود را وارد کنید">
                            </div>
                        </div>
                    @endif
                    <div class="col-md-12">
                        <div class="form-group">
                                                    <textarea class="form-control" name="body" rows="5"
                                                              placeholder="دیدگاه خود را وارد کنید ..."></textarea>
                        </div>
                        <input type="submit" class="btn btn-primary1"   value="ثبت دیدگاه">
                    </div>

                </form>
            </div>
        </div>
    </div>


</div>
