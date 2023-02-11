@extends('site.layout.master')

@section('stylus')

    <link rel="stylesheet" href="{{ url('ivna-theme') }}/assets/sass/image-gallery.css">
@endsection

@section('seos')

    <title>@lang('site.seo_gallery_page')</title>

    <meta name="description" content="@lang('site.seo_gallery_page_desc')" />

    <link rel="alternate" hreflang="fa" href="{{ route('site.images') }}" />

    <meta http-equiv="content-language" content="fa" />

    <meta name="keywords" content="@lang('seo_gallery_keywords')" />

    <meta name="dc.publisher" content="@lang('site.seo_gallery_page')" />
    <meta name="dc.identifier" content="https://www.ivnanews.ir" />
    <meta name="copyright" content="©2021 Ivna News Agency (www.ivnanews.ir)" />
    <!--<meta name="dcterms.created" content="2002-10-14T15:24:23+00:00" />-->
    <!--<meta name="dcterms.modified" content="2021-08-11 T 09:22:56 +0430" />-->
    <meta itemprop="name" content="@lang('site.seo_gallery_page')" />
    <meta itemprop="description" content="@lang('site.seo_gallery_description')" />


        <meta itemprop="image" content="https://www.ivnanews.ir/storage//photos/1/ivna-..-site.png" />
        <meta name="twitter:image:src" content="https://www.ivnanews.ir/storage//photos/1/ivna-..-site.png" />
        <meta name="twitter:image" content="https://www.ivnanews.ir/storage//photos/1/ivna-..-site.png" />
        <meta property="og:image" content="https://www.ivnanews.ir/storage//photos/1/ivna-..-site.png" />

    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="@lang('site.seo_gallery_page')" />
    <meta name="twitter:description" content="" />
    <meta name="twitter:site" content="@IvnaNews_Agency" />

    <meta name="twitter:image:alt" content="@lang('site.seo_gallery_page')" />
    <meta name="twitter:domain" content="https://www.ivnanews.ir" />
    <meta property="og:title" content="@lang('site.seo_gallery_page')" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://www.ivnanews.ir" />

    <meta property="og:description" content="@lang('site.seo_gallery_description')" />
    <meta property="og:site_name" content="@lang('seo_site_name')" />
    <meta property="article:published_time" content="2021-08-11 T 09:22:56 +0430" />
    <meta name="date" content="2021-08-11 T 09:22:56 +0430" />
    <meta property="og:locale" content="fa_IR" />
    <meta property="og:article:author" content="@lang('site.seo_gallery_page')" />
    <meta property="og:article:section" content="صفحه نخست" />
    <meta name="generator" content="https://www.ivnanews.ir" />
    <meta name="language" content="fa" />
    <meta name="rating" content="General" />
    <meta name="expires" content="never" />
    <meta name="robots" content="INDEX,FOLLOW" />
    <meta name="publisher" content="@lang('site.seo_gallery_page')" />
    <link rel="canonical" href="https://www.ivnanews.ir/" />


@endsection




@section('content')
    <div class="image-gallery">
        <div class="new-container">
            @if(isset($main_galleries) && !empty($main_galleries) && count($main_galleries) > 0)
                <div class="image-slider">
                    <div class="owl-carousel owl-theme  owl-carousel-service slider1">

                        @foreach($main_galleries as $key => $gallery)
                            <div class="item">
                                <div class="camera-icon">
                                    <a href="{{ $gallery->path() }}">
                                        <i class="fa fa-camera"></i>
                                    </a>
                                </div>
                                <div class="news-image">
                                    <a href="{{ $gallery->path() }}">
                                        <img src="{{ $gallery->picture() }}"
                                             alt="{{ $gallery->title }}"
                                             height="135" width="180"/>
                                    </a>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            @endif

            @if(isset($selected_images) && !empty($selected_images) && count($selected_images) > 0)
                <div class="selected-images">
                    <div class="title">
                        <h2>تصاویر برگزیده</h2>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="image-box">
                                <div class="camera-icon">
                                    <a href="">
                                        <i class="fa fa-camera"></i>
                                    </a>
                                </div>
                                <div class="news-image">

                                    <a href="">
                                        <img src="{{ url('ivna-theme') }}/images/esteghlal.jpg" height="200"
                                             width="300"/>
                                    </a>
                                </div>
                                <div class="news-title">
                                    <h2>
                                        <a href="">
                                            دیدار تیم های استقلال و پرسپولیس
                                        </a>
                                    </h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="image-box">
                                <div class="camera-icon">
                                    <a href="">
                                        <i class="fa fa-camera"></i>
                                    </a>
                                </div>
                                <div class="news-image">
                                    <a href="">
                                        <img src="{{ url('ivna-theme') }}/images/derbi.jpg" height="209" width="300"/>
                                    </a>
                                </div>
                                <div class="news-title">
                                    <h2>
                                        <a href="">
                                            شروع بازی های ملی از ماه آینده
                                        </a>
                                    </h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="image-box">
                                <div class="camera-icon">
                                    <a href="">
                                        <i class="fa fa-camera"></i>
                                    </a>
                                </div>
                                <div class="news-image">
                                    <a href="">
                                        <img src="{{ url('ivna-theme') }}/images/esteghlal.jpg" height="200"
                                             width="300"/>
                                    </a>
                                </div>
                                <div class="news-title">
                                    <h2>
                                        <a href="">
                                            دیدار تیم های استقلال و پرسپولیس
                                        </a>
                                    </h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif




            @if(isset($latests) && !empty($latests) && count($latests) > 0)
                <div class="last-images">
                    <div class="title">
                        <h2>آخرین تصاویر</h2>
                    </div>
                    <div class="row">
                        @foreach($latests as $last)
                            <div class="col-md-3">
                                <div class="image-box">
                                    <div class="camera-icon">
                                        <a href="{{ $last->path() }}">
                                            <i class="fa fa-camera"></i>
                                        </a>
                                    </div>
                                    <div class="news-image">
                                        <a href="{{ $last->path() }}">
                                            <img src="{{ $last->picture()  }}"
                                                 alt="{{ $last->picture() }}"
                                                 height="120"
                                                 width="180"/>
                                        </a>
                                    </div>
                                    <div class="news-title">
                                        <h2>
                                            <a href="{{ $last->path() }}">
                                                {{ $last->title }}
                                            </a>
                                        </h2>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>


                </div>
            @endif


            @if(isset($mviews) && !empty($mviews) && count($mviews) > 0)
                <div class="most-visited">
                    <div class="row">
                        @if(isset($mviews[0]) && !empty($mviews[0]))
                            <div class="col-md-6">
                                <div class="news-box">
                                    <div class="camera-icon">
                                        <a href="{{ $mviews[0]->article->path() }}">
                                            <i class="fa fa-camera"></i>
                                        </a>
                                    </div>
                                    <div class="news-image">
                                        <a href="{{ $mviews[0]->article->path() }}">
                                            <img src="{{ $mviews[0]->article->picture() }}"
                                                 alt="{{ $mviews[0]->article->title }}"
                                                 height="417" width="626"/>
                                        </a>
                                    </div>
                                    <div class="news-title">
                                        <h2>
                                            {{ $mviews[0]->article->title }}
                                        </h2>
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if(count($mviews) > 1)
                            <div class="col-md-6">
                                <div class="news-items-box">
                                    @foreach($mviews as $key => $mv)
                                        <div class="news-items">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="news-image">
                                                        <a href="{{ $mv->article->path() }}">
                                                            <img src="{{ $mv->article->picture() }}"
                                                                 alt="{{ $mv->article->title }}"
                                                                 height="120"
                                                                 width="180"/>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="news-caption">
                                                        @if(isset($mv->article->head_title) && !empty($mv->article->head_title))
                                                            <div class="news-titr">
                                                                <p>
                                                                    {{ $mv->article->head_title }}
                                                                </p>
                                                            </div>
                                                        @endif
                                                        <div class="news-title">
                                                            <h2>
                                                                <a href="{{ $mv->article->path() }}">
                                                                    {{ $mv->article->title }}
                                                                </a>
                                                            </h2>
                                                        </div>
                                                        <div class="news-desc">
                                                            <p>
                                                                {{ \Illuminate\Support\Str::limit($mv->article->description , 150 ) }}
                                                            </p>
                                                        </div>
                                                        <div class="comment">
                                                            <div class="idea">
                                                                <a href="#">
                                                                    <i class="fa fa-comment-o"></i>
                                                                </a>
                                                                <a href="" class="set-comment">
                                                                    نظر بدهید
                                                                </a>
                                                            </div>
                                                            <div class="idea-numbers">
                                                                <a href="" class="published-comment">
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
                            </div>
                        @endif
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection

