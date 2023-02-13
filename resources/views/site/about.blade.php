@extends('site.layout.master')


@section('seos')


    <title>{{ $about['title']->print }}</title>
    <meta http-equiv="content-language" content="fa"/>
    <meta name="dc.publisher" content="@lang('site.seo_first_page')"/>
    <meta name="dc.identifier" content="https://www.techli.ir"/>
    <meta name="copyright" content="©2021 techli Agency (www.techli.ir)"/>
    <meta itemprop="inLanguage" content="fa"/>
    <meta itemprop="name" content="{{ $about['title']->print }}"/>




    <meta itemprop="description" content="{{ $about['description']->print }}"/>
    <meta itemprop="image" content="{{ $about['image']->print }}"/>


    <link rel="alternate" hreflang="fa" href="{{ route('site.about') }}"/>
    <link rel="canonical" href="{{ route('site.about') }}">


    <meta property="og:title" itemprop="headline" content="{{ $about['title']->print }}"/>

    <meta property="og:type" content="article"/>
    <meta property="og:url" content="{{ route('site.about') }}"/>
    <meta property="og:description" itemprop="description" content="{{ $about['description']->print }}"/>
    <meta property="og:site_name" content="@lang('site.seo_first_page')"/>
    <meta property="og:locale" content="fa_IR"/>
    <meta property="og:article:author" content="@lang('site.seo_first_page')"/>
   
    <meta property="og:image" itemprop="image" content="{{ $about['image']->print }}"/>

    <meta name="twitter:card" content="article"/>
    <meta name="twitter:site" content="@techli" />
    <meta name="twitter:title" content="{{ $about['title']->print }}"/>
    <meta name="twitter:description" content="{{ $about['description']->print }}"/>
    <meta name="twitter:image" content="{{ $about['image']->print }}"/>

    <meta itemprop="datePublished" property="article:published_time" content="2023-08-12"/>
    <meta itemprop="dateModified" property="article:modified"
          content="{{ $today }}"/>
          
    <meta name="thumbnail" itemprop="thumbnailUrl" content="{{ $about['image']->print }}"/>
    <meta name="genre" itemprop="genre" content="News"/>

    <meta name="description" content="{{ $about['description']->print }}"/>
    <meta name="dc.identifier"
          content="{{ route('site.about') }}"/>



    <script type="application/ld+json">
{
   "@context": "https://schema.org",
   "@type": "NewsArticle",
   "url": "{{ route('site.about') }}",
   "publisher":{
      "@type":"Organization",
      "name":"techli",
      "logo":"https://techli.ir/storage//photos/1/205px-Esteghlal_Tehran_FC_logo.svg.png"
   },
   "headline": "{{ $about['title']->print }}",
   "mainEntityOfPage": "{{ route('site.about') }}",
   "articleBody": "{{ $about['description']->print }}",

   "image":[  @if(isset($article->image) && !empty($article->image))
            "{{ $about['image']->print }}"
      @else
            "https://techli.ir/storage//photos/1/205px-Esteghlal_Tehran_FC_logo.svg.png"
@endif
        ],

        "datePublished":"2023-08-12"
}




    </script>


@endsection

@section('content')

  <div class="wrapper">
        <div class="container">
            <div class="page-big">
                <section class="single">
                    <header>
                        <h1 class="single-post-title">
                            <a href="{{ route('site.about') }}">{{ $about['title']->print }} </a></h1><br>
                    </header>
                    <div class="post-content clearfix">
                        <p>
                           {{ $about['body']->print }}
                        </p>
                        <div class="page-bottom">
                        </div>
                    </div>
                    <!---->
                    <div id="lin-10"></div>
                </section>






            </div>
        </div>
    </div>
    



@endsection

