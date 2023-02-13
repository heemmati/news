<div id="footer-top">
    <div class="container">
        <div class="footer-top-1">
            <div id="footer-1">
                <div class="footer-1">
                    <div class="sidebar-box-footer mo">
                        <div class="before_title">
                            <b>آخرین اخبار</b>
                        </div>
                        <div class="sidebar-axenan">
                            <div class="list_post">
                                @if(isset($fnews) && !empty($fnews) && count($fnews) > 0)

                                    @foreach($fnews as $fn)
                                        <li>
                                            <div class="list_post_contin">
                                                <h2>
                                                    <a href="{{ $fn->path() }}">
                                                        {{ $fn->title  }}
                                                    </a>
                                                </h2>
                                                <time>{{ $fn->timeHandler() }}</time>
                                            </div>
                                        </li>
                                        @endforeach


                                        </ul>
                                        @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-top-2">
            <div id="footer-2">
                <div class="footer-2">
                    @if(isset($footer_news) && !empty($footer_news) && count($footer_news) > 0)
                        <div class="sidebar-box-footer mo">
                            <div class="before_title"><b>اخبار در صدر</b></div>
                            <div class="sidebar-box-footer-content">
                                <div class="post-wrap">
                                    @foreach($footer_news as $fonew)
                                        <div class="column-post-item clearfix">
                                            <div class="column-post-thumb">
                                                <a href="{{ $fonew->path() }}"><img
                                                        width="100" height="70"
                                                        src="{{ \Illuminate\Support\Facades\Storage::url($fonew->image) }}"
                                                        alt="{{ $fonew->title }}"
                                                        title="{{ $fonew->title }}"/></a>
                                            </div>
                                            <h2 class="post-title">
                                                <a
                                                    href="{{ $fonew->path() }}">
                                                    {{ $fonew->title }}
                                                </a>
                                            </h2>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="footer-top-3">
            <div id="footer-3">
                <div class="footer-3">
                    <div class="sidebar-box-footer mo">
                        @if(isset($footer_about) && !empty($footer_about))
                            <div class="before_title"><b>درباره سایت</b></div>
                            <div class="sidebar-box-footer-content">
                                <div class="post-wrap">
                                    <div class="textwidget">

                                        <p>
                                            {{ $footer_about->print }}
                                        </p>

                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="sidebar-box-footer mo">
                        <div class="before_title"><b>برچسب ها</b></div>
                        @if(isset($footer_tags) && !empty($footer_tags) && count($footer_tags) > 0)
                            <div class="sidebar-box-footer-content">
                                <div class="post-wrap">
                                    <div class="tagcloud">
                                        @foreach($footer_tags as $ftag)
                                            <a
                                                href="{{ $ftag->path()  }}"
                                                class="tag-cloud-link" aria-label="{{ $ftag->title }}">{{ $ftag->title }}</a>
                                        @endforeach
                                    </div>
                                </div>
                                @endif
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <footer id="footer">
        <div class="container" id="footer-container">
            <div class="clearfix">
                <a id="footer-logo" href="{{ url('/') }}">

                    @ischeck($general['logo'])
                    <img src="{{ \Illuminate\Support\Facades\Storage::url($general['logo']->print) }}"
                         alt="@lang('site.site_name')"/>
                    @endischeck


                </a>
                <div id="copyright">
                   <p>
                       
<a href="https://www.eepek.com/%D8%B7%D8%B1%D8%A7%D8%AD%DB%8C-%D8%B3%D8%A7%DB%8C%D8%AA" target="_blank">طراحی سایت</a>
و
<a href="https://www.eepek.com/%D8%B3%D8%A6%D9%88-%D9%88-%D8%A8%D9%87%DB%8C%D9%86%D9%87-%D8%B3%D8%A7%D8%B2%DB%8C-%D8%B3%D8%A7%DB%8C%D8%AA" target="_blank">بهینه سازی</a>
 توسط
 <a href="https://eepek.com">ایپک</a>
                    </p>
                    <p>@lang('site.use_with_name') </p>
                </div>
                <div class="pull-left hidden-sm hidden-xs clearfix" id="social-icons">
                    <ul class="clearfix"><br>
                        <ul class="header-social">
                            <li class="facebook"><a href="آدرس لینک شما"></a></li>
                            <li class="twitter"><a href="آدرس لینک شما"></a></li>
                            <li class="instagram"><a href="آدرس لینک شما"></a></li>
                            <li class="telegram"><a href="آدرس لینک شما"></a></li>
                            <li class="googleplus"><a href="آدرس لینک شما"></a></li>
                            <li class="aparat"><a href="آدرس لینک شما"></a>
                            <li class="youtube"><a href="آدرس لینک شما"></a>
                            <li class="rss"><a href="http://aftab.demo-qaleb.ir/feed/rss/"></a></li>


                        </ul>
                        <br>
                        <div>
                            <ul id="menu-%d8%a8%d8%a7%d9%84%d8%a7-%d9%88-%d9%81%d9%88%d8%aa%d8%b1-1" class="menu">
                                <li><a href="http://aftab.demo-qaleb.ir/feed/rss/">خوراک</a></li>
                                <li><a href="http://#">آب
                                        و هوا</a></li>
                                <li><a href="http://#">قیمت
                                        ها</a></li>
                                <li><a href="http://#">اوقات
                                        شرعی</a></li>
                            </ul>
                        </div>
                    </ul>

                </div>
            </div>
            <div class="developed-box">
                <li><a href="https://eepek.com/" title="طراحی و توسعه : ایپک" target="_blank">
                        <div class="developed"></div>
                    </a></li>
            </div>
        </div>

    </footer>

    <div id="topcontrol" class="fa fa-angle-up" title="رفتن به بالا"></div>
    <script type='text/javascript' src='{{ url('taj-theme') }}/assets/js/scripts.js'></script>
    </body>

    </html>
