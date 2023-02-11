<div class="single-comments-section-form">
    <h2 class="single-content-title">درج دیدگاه</h2>
    <form action="{{ route('site.comment.save') }}" method="POST"  id="comment_form">
        @csrf

        <input type="hidden" name="commentable_id" value="{{ $id }}">
        <input type="hidden" name="commentable_type" value="{{ $type }}">

        <input type="hidden" id="parent_change" name="parent_id" value="0">

        <div class="row">
            @if(\Illuminate\Support\Facades\Auth::guest())
            <div class="col-md-12">


                <div class="form-group">
                    <input type="text" name="name" class="form-control" placeholder="نام و نام خانوادگی خود را وارد کنید">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="ایمیل خود را وارد کنید">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <input type="number"   name="mobile" class="form-control" placeholder="شماره همراه  خود را وارد کنید">
                </div>
            </div>

            @endif
            <div class="col-md-12">
                <div class="form-group">
                                                    <textarea class="form-control" name="body" rows="5"
                                                              placeholder="دیدگاه خود را وارد کنید ..."></textarea>
                </div>
                <button class="btn btn-danger" type="submit">
                    ثبت دیدگاه
                </button>
            </div>
        </div>
    </form>
</div>
