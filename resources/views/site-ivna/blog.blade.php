@extends('site.layout.master')

@section('stylus')

    <link rel="stylesheet" href="{{ url('ivna-theme') }}/assets/sass/news-service.css">
@endsection

@section('seos')


    <meta http-equiv="content-language" content="fa" />
    <meta name="dc.publisher" content="@lang('site.seo_archive_page')" />
    <meta name="dc.identifier" content="https://www.ivnanews.ir" />
    <meta name="copyright" content="©2021 ivnanews Agency (www.ivnanews.ir)" />
    <meta itemprop="inLanguage" content="fa" />
    <meta itemprop="name" content="@lang('site.seo_archive_page')" />




    <meta itemprop="description" content="@lang('site.seo_archive_description')" />



    <link rel="alternate" hreflang="fa" href="{{ url('/archive') }}"/>
    <link rel="canonical" href="{{ url('/archive') }}" >


    <meta property="og:title" itemprop="headline" content="@lang('site.seo_archive_page')" />

    <meta property="og:type" content="article" />
    <meta property="og:url" content="{{ url('/archive') }}" />
    <meta property="og:description" itemprop="description" content="@lang('site.seo_archive_description')" />
    <meta property="og:site_name" content="@lang('site.seo_archive_page')" />
    <meta property="og:locale" content="fa_IR" />

    <meta name="twitter:card" content="article" />
    <meta name="twitter:title" content="@lang('site.seo_archive_page')" />
    <meta name="twitter:description" content="@lang('site.seo_archive_description')"/>

    <meta name="description" content="@lang('site.seo_archive_description')" />
    <meta name="dc.identifier"
          content="{{ url('/archive') }}" />

@endsection


@section('content2')

    <main class="main">
        @if(isset($news) && !empty($news))
            <div class="container">
                <div class="row">
                    <div class="box5">
                        <h1 class="title title-box">
                             <span>


                @lang('site.seo_archive_page')

                         </span>
                        </h1>
                        <div class="search-box">


                            <div class="item-box1">

                                @foreach ($news as $key => $new)
                                    <div class="item3 {{ $key == count($news) - 1 ? 'end1' : '' }}">
                                        <div class="item-image">
                                            <x-site.tools.image :image="$new"></x-site.tools.image>
                                        </div>
                                        <div class="description3">
                                            <div class="title">
                                                <h4>
                                                    <a href="{{ $new->path() }}">
                                                        {{  $new->title }}
                                                    </a>
                                                </h4>
                                            </div>
                                            <div class="desc">
                                                <p>
                                                    {{ $new->description }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                @endforeach




                            </div>

                        </div>
                        {!! $news->render() !!}

                    </div>
                </div>
            </div>

        @endif
    </main>

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
                                <h1>آرشیو اخبار</h1>
                                @if(isset($news) && !empty($news) && count($news) > 0)
                                    <div class="news-items-box">

                                        @foreach($news as $new)
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
                            <div class="col-md-4">
                                @if(isset($latests) && !empty($latests) && count($latests) > 0)
                                    <div class="last-news">
                                        <div class="title">
                                            <h2>آخرین اخبار</h2>
                                        </div>
                                        <div class="last-news-box">
                                            <ul>
                                                @foreach($latests as $new)
                                                    <li>
                                                        <a href="{{ $new->path() }}">
                                                            {{ $new->title }}
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
