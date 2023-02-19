<div class="container">
    <div class="breadcrumb">
        <div class="breadcrumb-title">شما اینجا هستید :</div>
        <ul>
            <li><a href="{{ url('/') }}" title="@lang('site.site_name')">صفحه اصلی</a></li>
            @if(isset($article->categories) && !empty($article->categories))
                <li>

                    @foreach ($article->categories as $red => $category)
                        @if($red == 0)
                            <a href="{{ $category->path() }}">{{ $category->title }}</a>

                        @endif
                    @endforeach


                </li>
            @endif

            <li>{{ $article->title }}</li>
        </ul>
    </div>
</div>
<div class="container">
    <div class="row" id="content">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-8 middl">
                    <section class="single">
                        <div id="lin-10"></div>
                        <header>
                            @if(isset($article->head_title) && !empty($article->head_title))
                                <small class=" text-muted"><i class="fa fa-stop" aria-hidden="true"></i>
                                    {{ $article->head_title }}
                                </small><br>
                            @endif
                            <h1 class="single-post-title">
                                <a href="{{ $article->path() }}">
                                    {{ $article->title }}
                                </a></h1>
                            <div class="meta-right">
                                <i class="fa fa-envelope-o" aria-hidden="true"></i>&nbsp;
                                <a rel="nofollow" class="send_file left"
                                   href="mailto:?subject={{ $article->path() }}"
                                   title="ارسال  : {{ $article->title }}">ارسال
                                </a></div>
                            <a class="print" href="#"
                               onclick='window.open("{{ $article->path() }}?print=1", "printwin","left=200,top=200,width=820,height=550,toolbar=1,resizable=0,status=0,scrollbars=1");'><i
                                        class="fa fa-print" aria-hidden="true"></i>&nbsp; پرینت</a><br>
                        </header>
                        <div class="single-thumb">
                            <a href="{{ $article->picture() }}">
                                <img
                                        width="620" height="410"
                                        src="{{ $article->picture() }}"
                                        alt="{{ $article->title }}"
                                        title="{{ $article->title }}"/></a>
                        </div>
                        <header>
                                <span>
                                    شناسه خبر : {{ $article->code }}
                                     </span>
                            <span>
                                     تاریخ انتشار : {{ $article->timeHandler() }}
                                      </span>
                            <span>
                                     {{ $view  }} بازدید
                                      </span>


                        </header>
                        <div class="post-content clearfix">

                            <div class="lead">
                                {{ $article->description }}
                            </div>


                            <div class="full-text">
                                @if(isset($content) && !empty($content))
                                    {!! $content !!}
                                @else
                                    {!! $article->body !!}
                                @endif
                            </div>





                            <div class="page-bottom">
                                <div class="bottom-social">
                                        <span><b><i class="fa fa-share-alt" aria-hidden="true"></i></b> به اشتراک
                                            بگذارید : </span>
                                    <ul class="single-social">
                                        <li class="telegram"><a target="_blank"
                                                                href="https://telegram.me/share/url?url={{ $article->path() }}"></a>
                                        </li>
                                        <li class="facebook"><a target="_blank"
                                                                href="http://www.facebook.com/sharer/sharer.php?u={{ $article->path() }}"></a>
                                        </li>
                                        <li class="twitter"><a target="_blank"
                                                               href="http://twitter.com/home?status={{ $article->path() }}"></a>
                                        </li>

                                        <li class="linkedin"><a target="_blank"
                                                                href="https://www.linkedin.com/shareArticle?mini=true&amp;url={{ $article->path() }}"></a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="report">
                                    <div class="page-bottom-link">
                                        <i class="fa fa-link"></i>
                                        <div class="page-bottom-link-text" id="permalink">
                                            {{ url('/' . $article->short ) }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box-header">
                            <b>برچسب ها </b>
                        </div>

                        <div class="tag">
                            @foreach($article->tags as $tag)
                                <a
                                        href="{{ $tag->path() }}"
                                        rel="tag">{{ $tag->title }}</a>
                            @endforeach
                        </div>
                        <div id="lin-10"></div>
                        <div class="ads"><a href="#"> <img src="{{ url('taj-theme') }}/assets/img/ads.png" width="100%" height="90"
                                                           alt=""/>
                            </a>
                            <p></p>
                        </div>
                        <div class="box-header">
                            <b>اخبار مشابه</b>
                        </div>
                        @foreach($similars as $similar)
                            <div class="index-relate-post">
                                <div class="index-relate-post-txt"><a
                                            href="{{ $similar->path() }}"><i
                                                class="fa fa-stop" aria-hidden="true"></i>
                                        {{ $similar->title }}
                                    </a>
                                    <time> {{ $similar->timeHandler() }}</time>
                                </div>
                            </div>
                        @endforeach
                        <!---->

                        <div class="separator"></div>
                        <div class="ads"><a href="#"> <img src="{{ url('taj-theme') }}/assets/img/ads.png" width="100%" height="90"
                                                           alt=""/>
                            </a></div>
                        <div id="lin-10"></div>
                        <div class="box-header">
                            <b>ثبت دیدگاه</b>
                        </div>

                        <div class="hints"><i class="fa fa-exclamation"></i>
                            <div class="des-hints">
                                <ul>
                                    <li>دیدگاه های ارسال شده توسط شما، پس از تایید توسط تیم مدیریت در وب منتشر
                                        خواهد شد.
                                    </li>
                                    <li>پیام هایی که حاوی تهمت یا افترا باشد منتشر نخواهد شد.</li>
                                    <li>پیام هایی که به غیر از زبان فارسی یا غیر مرتبط باشد منتشر نخواهد شد.</li>
                                </ul>
                            </div>
                        </div>


                        <!-- You can start editing here. -->


                        <!-- If comments are open, but there are no comments. -->


                        <div class="box_wrapper">
                            <div class="cm_wrapper">



                                <form action="{{ route('site.comment.save') }}" method="POST" id="commentform">
                                    @csrf
                                    @include('error.forms')
                                    <input type="hidden" name="commentable_type" value="{{ get_class($article) }}">
                                    <input type="hidden" name="commentable_id" value="{{ $article->id }}">

                                    <p>

                                        <input type="text" placeholder="نام شما :" name="name" id="author"
                                               value=""
                                               size="22" tabindex="1" aria-required='true'/>

                                        <label for="author"></label>

                                    </p>

                                    <p>

                                        <input type="text" placeholder="پست الکترونیکی :" name="email" id="email"
                                               value="" size="22" tabindex="2" aria-required='true'/>

                                        <label for="email"></label>

                                    </p>


                                    <!--<p><small><strong>XHTML:</strong> You can use these tags: <code>&lt;a href=&quot;&quot; title=&quot;&quot;&gt; &lt;abbr title=&quot;&quot;&gt; &lt;acronym title=&quot;&quot;&gt; &lt;b&gt; &lt;blockquote cite=&quot;&quot;&gt; &lt;cite&gt; &lt;code&gt; &lt;del datetime=&quot;&quot;&gt; &lt;em&gt; &lt;i&gt; &lt;q cite=&quot;&quot;&gt; &lt;s&gt; &lt;strike&gt; &lt;strong&gt; </code></small></p>-->


                                    <p>

                                            <textarea type="text" placeholder="متن پیام شما :" name="body"
                                                      id="comment"
                                                      class="comment_textarea" cols="100%" rows="10"
                                                      tabindex="4"></textarea>

                                    </p>



                                    <div class="captcha">
                                        <span>{!! captcha_img() !!}</span>
                                        <button type="button" class="btn btn-danger" class="reload" id="reload">
                                            &#x21bb;
                                        </button>
                                    </div>

                                    <input id="captcha" type="text" class="" placeholder="{{ __('site.enter_captcha') }}" name="captcha">




                                    <input name="submit" type="submit" id="submit" tabindex="5" value="ثبت دیدگاه"/>




                                </form>


                            </div><!-- /cm_wrapper -->
                        </div><!-- End box_wrapper -->


                    </section>
                </div>
                <div class="col-md-4">
                    <div id="sidebar-left">
                        <div class="sidebar-left">
                            <div class="scrollbar-inner" id="politics-scrollable">
                                @if(isset($most_viewed) && !empty($most_viewed) && count($most_viewed) > 0)
                                    <div class="sidebar-box">
                                        <div class="column-header"><span class="bullet"></span>
                                            <h3><b>پربازدیدترین</b></h3>
                                        </div>
                                        <div class="sidebar-box-content-left">
                                            <div class="post-wrap">
                                                @foreach($most_viewed as $new)
                                                    @if(isset($new->article) && !empty($new->article) && $new->article->status == 1)
                                                        <div class="column-post-item clearfix">
                                                            <div class="column-post-thumb">
                                                                <a href="{{ $new->article->path() }}"><img
                                                                            width="100" height="70"
                                                                            src="{{ $new->article->picture() }}"
                                                                            alt="{{ $new->article->title }}"
                                                                            title="{{ $new->article->title }}"/></a>
                                                            </div>
                                                            <h3 class="post-title">
                                                                <a href="{{ $new->article->path() }}">
                                                                    {{ $new->article->title  }}
                                                                </a>
                                                            </h3>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                @if(isset($latests) && !empty($latests) && count($latests) > 0)
                                    <div class="sidebar-box">
                                        <div class="column-header"><span class="bullet"></span>
                                            <h3><b>جدیدترین مطالب</b></h3>
                                        </div>
                                        <div class="sidebar-box-content-left">
                                            <div class="post-wrap">
                                                @foreach($latests as $new)
                                                    <div class="column-post-item clearfix">
                                                        <div class="column-post-thumb">
                                                            <a href="{{ $new->path() }}"><img
                                                                        width="100" height="70"
                                                                        src="{{ $new->picture() }}"
                                                                        alt="{{ $new->title }}"
                                                                        title="{{ $new->title }}"/></a>
                                                        </div>
                                                        <h3 class="post-title">
                                                            <a href="{{ $new->path() }}">
                                                                {{ $new->title }}
                                                            </a>
                                                        </h3>
                                                    </div>
                                                @endforeach


                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <!--/.col-md-4-->
            </div>
            <!--/.row-->
        </div>
        <!--/.col-md-10-->
        <!--<div class="col-md-2 ads">-->
        <!--    <section id="ads">-->
        <!--        <div class="all_ads"><a href="http://aftab.demo-qaleb.ir/" target="_blank" rel="nofollow"><img-->
        <!--                    src="{{ url('taj-theme') }}/assets/img/ads-2.png"></a></div>-->
        <!--        <div class="all_ads"><a href="" target="_blank" rel="nofollow"><img src="{{ url('taj-theme') }}/assets/img/ads-2.png"></a>-->
        <!--        </div>-->
        <!--        <div class="all_ads"><a href="" target="_blank" rel="nofollow"><img src="{{ url('taj-theme') }}/assets/img/ads-2.png"></a>-->
        <!--        </div>-->
        <!--    </section>-->
        <!--</div>-->
    </div>
    <!--/.row#content-->
</div>