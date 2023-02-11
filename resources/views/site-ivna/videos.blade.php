@extends('site.layout.master')

@section('stylus')
    <link rel="stylesheet" href="{{ url('ivna-theme') }}/assets/sass/films.css">
@endsection


@section('seos')

    <title>@lang('site.seo_videos_page')</title>

    <meta name="description" content="@lang('site.seo_videos_page_desc')" />

    <link rel="alternate" hreflang="fa" href="{{ route('site.videos') }}" />

    <meta http-equiv="content-language" content="fa" />

    <meta name="keywords" content="@lang('seo_videos_keywords')" />

    <meta name="dc.publisher" content="@lang('site.seo_videos_page')" />
    <meta name="dc.identifier" content="https://www.ivnanews.ir" />
    <meta name="copyright" content="©2021 Ivna News Agency (www.ivnanews.ir)" />
    <!--<meta name="dcterms.created" content="2002-10-14T15:24:23+00:00" />-->
    <!--<meta name="dcterms.modified" content="2021-08-11 T 09:22:56 +0430" />-->
    <meta itemprop="name" content="@lang('site.seo_videos_page')" />
    <meta itemprop="description" content="@lang('site.seo_videos_description')" />


    <meta itemprop="image" content="https://www.ivnanews.ir/storage//photos/1/ivna-..-site.png" />
    <meta name="twitter:image:src" content="https://www.ivnanews.ir/storage//photos/1/ivna-..-site.png" />
    <meta name="twitter:image" content="https://www.ivnanews.ir/storage//photos/1/ivna-..-site.png" />
    <meta property="og:image" content="https://www.ivnanews.ir/storage//photos/1/ivna-..-site.png" />

    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="@lang('site.seo_videos_page')" />
    <meta name="twitter:description" content="" />
    <meta name="twitter:site" content="@IvnaNews_Agency" />

    <meta name="twitter:image:alt" content="@lang('site.seo_videos_page')" />
    <meta name="twitter:domain" content="https://www.ivnanews.ir" />
    <meta property="og:title" content="@lang('site.seo_videos_page')" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://www.ivnanews.ir" />

    <meta property="og:description" content="@lang('site.seo_videos_description')" />
    <meta property="og:site_name" content="@lang('seo_site_name')" />
    <meta property="article:published_time" content="2021-08-11 T 09:22:56 +0430" />
    <meta name="date" content="2021-08-11 T 09:22:56 +0430" />
    <meta property="og:locale" content="fa_IR" />
    <meta property="og:article:author" content="@lang('site.seo_videos_page')" />
    <meta property="og:article:section" content="صفحه نخست" />
    <meta name="generator" content="https://www.ivnanews.ir" />
    <meta name="language" content="fa" />
    <meta name="rating" content="General" />
    <meta name="expires" content="never" />
    <meta name="robots" content="INDEX,FOLLOW" />
    <meta name="publisher" content="@lang('site.seo_videos_page')" />
    <link rel="canonical" href="https://www.ivnanews.ir/" />


@endsection




@section('content')
    <body>
    <div class="films">
        <div class="new-container">
            @if(isset($big_videos) && !empty($big_videos) && count($big_videos) > 0)
                <div class="row">
                    @if(isset($big_videos[0]) && !empty($big_videos[0]))
                        <div class="col-md-6">
                            <div class="film-box">
                                <div class="films-image">
                                    <a href="{{ $big_videos[0]->path() }}">
                                        <img src="{{ \Illuminate\Support\Facades\Storage::url($big_videos[0]->image) }}"
                                             alt="{{ $big_videos[0]->title }}"
                                             height="417" width="626"/>
                                    </a>
                                </div>
                                <div class="films-title">
                                    <h2>
                                        <a href="{{ $big_videos[0]->path() }}">
                                            {{ $big_videos[0]->title }}
                                        </a>
                                    </h2>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if(count($big_videos) > 1)

                        <div class="col-md-6">
                            <div class="film-items">
                                @foreach($big_videos as $key => $video)
                                    @if($key > 0)
                                        <div class="item">
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <div class="films-image">
                                                        <a href="{{ $video->path() }}">
                                                            <img
                                                                src="{{ \Illuminate\Support\Facades\Storage::url($video->image) }}"
                                                                height="417"
                                                                alt="{{ $video->title }}"
                                                                width="626"/>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="col-md-7">
                                                    <div class="films-caption">
                                                        <div class="news-titr">
                                                            @if(isset($video->head_title) && !empty($video->head_title))
                                                                <p>
                                                                    {{ $video->head_title }}
                                                                </p>
                                                            @endif
                                                        </div>
                                                        <div class="films-title">
                                                            <h2>
                                                                <a href="{{ $video->path() }}">
                                                                    {{ $video->title }}
                                                                </a>
                                                            </h2>
                                                        </div>
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
            @endif

            <div class="row">
                <div class="col-md-9">
                    @if(isset($day_videos) && !empty($day_videos) && count($day_videos) > 0)
                        <div class="topics">
                            <div class="topics-films-title">
                                <h2>
                                    موضوعات روز
                                </h2>
                            </div>
                            <div class="row">
                                @foreach($day_videos as $day)
                                    <div class="col-md-4">
                                        <div class="topics-film-box">
                                            <div class="films-image">
                                                <a href="{{ $day->path() }}">
                                                    <img src="{{ $day->picture() }}"
                                                         alt="{{ $day->title }}"
                                                         height="417"
                                                         width="626"/>
                                                </a>
                                            </div>
                                            <div class="films-title">
                                                <h2>
                                                    <a href="{{ $day->path() }}">
                                                        {{ $day->title }}
                                                    </a>
                                                </h2>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
                <div class="col-md-3">
                    @if(isset($latests) && !empty($latests) && count($latests) > 0 )
                        <div class="last-films">
                            <div class="last-film-title">
                                <h2>
                                    آخرین فیلم ها
                                </h2>
                            </div>


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
                    @endif
                </div>
            </div>
        </div>
    </div>
    </body>
@endsection
