@extends('site.layout.master')


@section('seos')

    <title>@lang('site.seo_about_page')</title>

    <meta name="description" content="@lang('site.seo_about_page_desc')" />

    <link rel="alternate" hreflang="fa" href="{{ route('site.about') }}" />

    <meta http-equiv="content-language" content="fa" />

    <meta name="keywords" content="@lang('site.seo_about_keywords')" />

    <meta name="dc.publisher" content="@lang('site.seo_about_page')" />
    <meta name="dc.identifier" content="https://www.ivnanews.ir" />
    <meta name="copyright" content="©2021 Ivna News Agency (www.ivnanews.ir)" />
    <!--<meta name="dcterms.created" content="2002-10-14T15:24:23+00:00" />-->
    <!--<meta name="dcterms.modified" content="2021-08-11 T 09:22:56 +0430" />-->
    <meta itemprop="name" content="@lang('site.seo_about_page')" />
    <meta itemprop="description" content="@lang('site.seo_about_description')" />

    @if(isset($about['image']) && !empty($about['image']))
    <meta itemprop="image" content="{{ \Illuminate\Support\Facades\Storage::url($about['image']->print) }}" />
    <meta name="twitter:image:src" content="{{ \Illuminate\Support\Facades\Storage::url($about['image']->print) }}" />
    <meta name="twitter:image" content="{{ \Illuminate\Support\Facades\Storage::url($about['image']->print) }}" />
    <meta property="og:image" content="{{ \Illuminate\Support\Facades\Storage::url($about['image']->print) }}" />
    @endif
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="@lang('site.seo_about_page')" />
    <meta name="twitter:description" content="" />
    <meta name="twitter:site" content="@IvnaNews_Agency" />

    <meta name="twitter:image:alt" content="@lang('site.seo_about_page')" />
    <meta name="twitter:domain" content="https://www.ivnanews.ir" />
    <meta property="og:title" content="@lang('site.seo_about_page')" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://www.ivnanews.ir" />

    <meta property="og:description" content="@lang('site.seo_about_description')" />
    <meta property="og:site_name" content="@lang('site.seo_site_name')" />
    <meta property="article:published_time" content="2021-08-11 T 09:22:56 +0430" />
    <meta name="date" content="2021-08-11 T 09:22:56 +0430" />
    <meta property="og:locale" content="fa_IR" />
    <meta property="og:article:author" content="@lang('site.seo_about_page')" />
    <meta property="og:article:section" content="صفحه نخست" />
    <meta name="generator" content="https://www.ivnanews.ir" />
    <meta name="language" content="fa" />
    <meta name="rating" content="General" />
    <meta name="expires" content="never" />
    <meta name="robots" content="INDEX,FOLLOW" />
    <meta name="publisher" content="@lang('site.seo_about_page')" />
    <link rel="canonical" href="https://www.ivnanews.ir/" />


@endsection


@section('content')


    <section class="about_page">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="about_page_caption">
                        <h1>
                            @if(isset($about['title']) && !empty($about['title']))
                                {{ $about['title']->print }}
                            @else
                                @lang('site.about_us')
                            @endif

                        </h1>

                        <p>
                            @if(isset($about['title']) && !empty($about['title']))
                                {{ $about['body']->print }}
                            @else
                                @lang('site.sample_about')
                            @endif
                        </p>
                    </div>
                </div>
                <div class="col-12 col-md-6">

                    @if(isset($about['image']) && !empty($about['image']))

                        <a href="{{ \Illuminate\Support\Facades\Storage::url($about['image']->print) }}">
                            <img src="{{ \Illuminate\Support\Facades\Storage::url($about['image']->print) }}" alt=" @if(isset($about['title']) && !empty($about['title']))
                            {{ $about['title']->print }}
                            @else
                            @lang('site.about_us')
                            @endif">
                        </a>
                    @endif
                </div>
            </div>
        </div>

    </section>

@endsection


