
@if(isset($comments) && !empty($comments) && count($comments) > 0)
    <aside class="zm-post-lay-f-area col-sm-6 col-md-12 col-lg-12 mt-70 pull-right">
        <div class="row mb-40">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="section-title">
                    <h2 class="h6 header-color inline-block ">آخرین نظرات</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="zm-posts">

                    @foreach($comments as $comment)
                        <div class="zm-post-lay-f zm-single-post clearfix">
                            <div class="zm-post-dis">
                                <p>
                                    @if (isset($comment->commentable)&& !empty($comment->commentable))
                                        <a href="{{ $comment->commentable->path() }}">
                                            @if(isset($comment->user) && !empty($comment->user))
                                                <a href="#">
                                                    {{ $comment->user->name }}
                                                </a>

                                            @else
                                                {{ $comment->name }}
                                            @endif
                                        </a>
                                        <a href="{{ $comment->commentable->path() }}">
                                            -<em>
                                                {{ \Illuminate\Support\Str::limit($comment->commentable->title , 30) }}
                                            </em>
                                        </a>
                                        <strong>
                                            {{ \Illuminate\Support\Str::limit($comment->body , 50) }}

                                        </strong>
                                    @endif

                                </p>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </aside>
@endif
{{-- Last Comments --}}
