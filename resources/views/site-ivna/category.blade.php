@extends('site.layout.master')

@section('stylus')

    <link rel="stylesheet" href="{{ url('ivna-theme') }}/assets/sass/news-service.css">
@endsection

@section('seos')


    <title>
        {{ $category->title }}
    </title>
    <meta http-equiv="content-language" content="fa"/>
    <meta name="dc.publisher" content="@lang('site.site_name')"/>
    <meta name="dc.identifier" content="https://www.ivnanews.ir"/>
    <meta name="copyright" content="©2021 ivnanews Agency (www.ivnanews.ir)"/>
    <meta itemprop="inLanguage" content="fa"/>
    <meta itemprop="name" content="@lang('site.site_name')"/>




    <meta itemprop="description" content="{{ $category->description }}"/>



    <link rel="alternate" hreflang="fa" href="{{ $category->path() }}"/>
    <link rel="canonical" href="{{ $category->path() }}">


    <meta property="og:title" itemprop="headline" content="{{ $category->title }}"/>

    <meta property="og:type" content="article"/>
    <meta property="og:url" content="{{ $category->path() }}"/>
    <meta property="og:description" itemprop="description" content="{{ $category->description }}"/>
    <meta property="og:site_name" content="@lang('site.site_name')"/>
    <meta property="og:locale" content="fa_IR"/>

    <!--<meta name="twitter:card" content="article" />-->
    <meta name="twitter:title" content="{{ $category->title }}"/>
    <meta name="twitter:description" content="{{ $category->description }}"/>

    <meta name="description" content="{{ $category->description }}"/>
    <meta name="dc.identifier"
          content="{{ $category->path() }}"/>

@endsection




@section('content')

    <body>
    <div class="news-service">
        <div class="new-container">
            <div class="row">
                <div class="col-md-9">
                    <div class="news-item-service">
                        <div class="row">
                            <div class="col-md-8">
                                @if(isset($bignews) && !empty($bignews) && count($bignews) > 0)

                                    @if(isset($bignews[0]) && !empty($bignews[0]))
                                        <div class="important-news-top">
                                            <div class="row">
                                                <div class="col-12 col-md-5">
                                                    @if(isset($bignews[0]->head_title) && !empty($bignews[0]->head_title))
                                                    <div class="news-titr">
                                                        <p>{{ $bignews[0]->head_title }}</p>
                                                    </div>
                                                    @endif

                                                    <div class="news-caption">
                                                        <div class="news-title">
                                                            <h2>
                                                                <a href="{{ $bignews[0]->path() }}">
                                                                    {{ $bignews[0]->title }}
                                                                </a>
                                                            </h2>
                                                        </div>
                                                        <div class="news-desc">
                                                            <a href="{{ $bignews[0]->path() }}">
                                                                {{ $bignews[0]->description }}
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-7">
                                                    <div class="news-image">

                                                        <a href="{{ $bignews[0]->path() }}">
                                                            <img
                                                                src="{{ \Illuminate\Support\Facades\Storage::url($bignews[0]->image) }}"
                                                                alt="{{ $bignews[0]->title }}"
                                                                height="445"
                                                                width="800"/>
                                                        </a>

                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                    @endif


                                    <div class="important-news-bottom">
                                        <div class="row">
                                            @foreach($bignews as $key => $big)
                                                @if($key > 0)
                                                    <div class="col-md-4">
                                                        <div class="important-news-box">
                                                            <div class="news-image">
                                                                <a href="{{ $big->path() }}">
                                                                    <img
                                                                        src="{{ \Illuminate\Support\Facades\Storage::url($big->image) }}"
                                                                        height="120" width="180"/>
                                                                </a>
                                                            </div>
                                                            <div class="news-caption">
                                                                @if(isset($big->head_title) && !empty($big->head_title))


                                                                    <div class="news-titr">
                                                                        <p>
                                                                            ایونا گزارش میدهد:
                                                                        </p>
                                                                    </div>
                                                                @endif
                                                                <div class="news-title">
                                                                    <h2>
                                                                        <a href="{{ $big->path() }}">
                                                                            {{ $big->title }}
                                                                        </a>
                                                                    </h2>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>

                                @endif
                            </div>
                            <div class="col-md-4">
                                @if(isset($mviews) && !empty($mviews) && count($mviews) > 0)
                                    <div class="last-news">
                                        <div class="title">
                                            <h2>آخرین اخبار</h2>
                                        </div>
                                        <div class="last-news-box">
                                            <ul>
                                                @foreach($mviews as $new)
                                                    <li>
                                                        <a href="{{ $new->article->path() }}">
                                                            {{ $new->article->title }}
                                                        </a>
                                                    </li>
                                                @endforeach

                                            </ul>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    @if(isset($latests) && !empty($latests) && count($latests) > 0)
                        <div class="news-items-box">

                            @foreach($latests as $new)
                                <div class="news-items">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="news-image">
                                                <a href="{{ $new->path() }}">
                                                    <img
                                                        src="{{ \Illuminate\Support\Facades\Storage::url($new->image) }}"
                                                        alt="{{ $new->title }}" height="120" width="180"/>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="news-caption">
                                                @if(isset($new->head_title) && !empty($new->head_title))
                                                    <div class="news-titr">
                                                        <p>
                                                            {{ $new->head_title }}
                                                        </p>
                                                    </div>
                                                @endif

                                                <div class="news-title">
                                                    <h2>
                                                        <a href="{{ $new->path() }}">
                                                            {{ $new->title }}
                                                        </a>
                                                    </h2>
                                                </div>
                                                <div class="news-desc">
                                                    <p>
                                                        {{ $new->description }}
                                                    </p>
                                                </div>
                                                <div class="comment">
                                                    <div class="idea">
                                                        <a href="#">
                                                            <i class="fa fa-comment-o"></i>
                                                        </a>
                                                        <a href="{{ $new->path() }}#comments" class="set-comment">
                                                            نظر بدهید
                                                        </a>
                                                    </div>
                                                    <div class="idea-numbers">
                                                        <a href="{{ $new->path() }}#comments" class="published-comment">
                                                            نظرات منتشر شده:
                                                            <span class="comment-numbers">3</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    @endif
                </div>
                <div class="col-md-3">
                    <div class="advertising">
                        <div class="advertising-box">
                            <a href="">
                                <img src="{{ url('ivna-theme') }}/images/12.gif" height="75" width="290"/>
                            </a>
                        </div>
                        <div class="advertising-box">
                            <a href="">
                                <img src="{{ url('ivna-theme') }}/images/13.gif" height="75" width="290"/>
                            </a>
                        </div>
                        <div class="advertising-box">
                            <a href="">
                                <img src="{{ url('ivna-theme') }}/images/14.gif" height="75" width="290"/>
                            </a>
                        </div>
                        <div class="advertising-box">
                            <a href="">
                                <img src="{{ url('ivna-theme') }}/images/15.gif" height="75" width="290"/>
                            </a>
                        </div>
                        <div class="advertising-box">
                            <a href="">
                                <img src="{{ url('ivna-theme') }}/images/2925461.jpg" height="70" width="295"/>
                            </a>
                        </div>
                        <div class="advertising-box">
                            <a href="">
                                <img src="{{ url('ivna-theme') }}/images/3087041.jpg" height="75" width="290"/>
                            </a>
                        </div>
                        <div class="advertising-box">
                            <a href="">
                                <img src="{{ url('ivna-theme') }}/images/3106730.gif" height="75" width="290"/>
                            </a>
                        </div>
                        <div class="advertising-box">
                            <a href="">
                                <img src="{{ url('ivna-theme') }}/images/3157882.jpg" height="75" width="290"/>
                            </a>
                        </div>
                        <div class="advertising-box">
                            <a href="">
                                <img src="{{ url('ivna-theme') }}/images/top.gif" height="75" width="290"/>
                            </a>
                        </div>
                        <div class="advertising-box">
                            <a href="">
                                <img src="{{ url('ivna-theme') }}/images/top2.gif" height="75" width="290"/>
                            </a>
                        </div>
                        <div class="advertising-box">
                            <a href="">
                                <img src="{{ url('ivna-theme') }}/images/right.jpg" height="75" width="290"/>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


    </body>

@endsection
