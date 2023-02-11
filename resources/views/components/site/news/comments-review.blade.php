
                   @foreach($comments as $comment)
                       <div class="single-review {{ $comment->parent_id == 0 ? 'clearfix' : 'second-comment'}}">
                            <div class="reviewer-img">
                                @if(isset($comment->user) && !empty($comment->user) && !empty($comment->user->avatar) && isset($comment->user->avatar))

                                    <img src="{{ \Illuminate\Support\Facades\Storage::url($comment->user->avatar) }}"
                                         alt="">
                                @else
                                    <img src="{{ url('site-theme') }}/images/inten/default-avatar.png"
                                         alt="">
                                @endif
                            </div>
                            <div class="reviewer-info">
                                <h4 class="reviewer-name">
                                    @if(isset($comment->user) && !empty($comment->user))
                                        <a href="#">
                                            {{ $comment->user->name }}
                                        </a>

                                    @else
                                        {{ $comment->name }}
                                    @endif
                                </h4>
                                <span class="date-time">
                                            {{ $comment->timeHandler() }}
                                    </span>
                                <P class="review_par">
                                    {{ $comment->body }}
                                </P>
                                <a href="javascript:void(0)" class="reply_this" data-parent="{{ $comment->id }}"> پاسخ </a>



                            </div>


                           @if(isset($comment->children) && !empty($comment->children) && count($comment->children) > 0)
                               <x-site.news.comments-review :comments="$comment->children"></x-site.news.comments-review>
                           @endif



                        </div>




                    @endforeach
