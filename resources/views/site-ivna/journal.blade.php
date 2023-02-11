@extends('site.layout.master')

@section('stylus')
    <link rel="stylesheet" href="{{ url('ivna-theme') }}/assets/sass/single-news.css">
@endsection

@section('seos')


    <title>{{ $article->title }}</title>
    <meta http-equiv="content-language" content="fa"/>
    <meta name="dc.publisher" content="@lang('site.seo_first_page')"/>
    <meta name="dc.identifier" content="https://www.ivnanews.ir"/>
    <meta name="copyright" content="©2021 ivnanews Agency (www.ivnanews.ir)"/>
    <meta itemprop="inLanguage" content="fa"/>
    <meta itemprop="name" content="{{ $article->title }}"/>




    <meta itemprop="description" content="{{ $article->description }}"/>
    <meta itemprop="image" content="{{ Storage::url($article->image) }}"/>


    <link rel="alternate" hreflang="fa" href="{{ $article->path() }}"/>
    <link rel="canonical" href="{{ $article->path() }}">


    <meta property="og:title" itemprop="headline" content="{{ $article->title }}"/>

    <meta property="og:type" content="article"/>
    <meta property="og:url" content="{{ $article->path() }}"/>
    <meta property="og:description" itemprop="description" content="{{ $article->description }}"/>
    <meta property="og:site_name" content="@lang('site.seo_first_page')"/>
    <meta property="og:locale" content="fa_IR"/>
    <meta property="og:article:author" content="@lang('site.seo_first_page')"/>
    <!--<meta property="og:article:section" content="@if(isset($article->categories) && !empty($article->categories))-->
    <!--                        @foreach ($article->categories as $category)-->
    <!--                            <a href="{{ $category->path() }}">{{ $category->title }}</a>-->
    <!--                                           @endforeach-->

    <!--                    @endif" />-->
    <meta property="og:image" itemprop="image" content="{{ Storage::url($article->image) }}"/>

    <meta name="twitter:card" content="article"/>
    <!--<meta name="twitter:site" content="@FarsNews_Agency" />-->
    <meta name="twitter:title" content="{{ $article->title }}"/>
    <meta name="twitter:description" content="{{ $article->description }}"/>
    <meta name="twitter:image" content="{{ Storage::url($article->image) }}"/>

    <meta itemprop="datePublished" property="article:published_time" content="{{ $article->created_at }}"/>
    <meta itemprop="dateModified" property="article:modified"
          content="{{ !empty($article->updated_at) ? $article->updated_at  : $article->created_at }}"/>
    <meta name="thumbnail" itemprop="thumbnailUrl" content="{{ Storage::url($article->image) }}"/>
    <meta name="genre" itemprop="genre" content="News"/>
    @if(isset($article->tags) && !empty($article->tags) && count($article->tags) > 0 )

        <meta name="keywords"
              content="@foreach($article->tags as $key => $tag){{ $tag->title }}{{ $key+1!=count($article->tags)?',':''}}@endforeach"/>
    @endif
    <meta name="description" content="{{ $article->description }}"/>
    <!--<meta name="dc.Date" scheme="ISO8601" content="8/11/2021 10:12:53 AM" />-->
    <meta name="dc.identifier"
          content="{{ $article->path() }}"/>
    <!--<meta name="Fna.oid" content="14000520000162" />-->



    <script type="application/ld+json">
{
   "@context": "https://schema.org",
   "@type": "NewsArticle",
   "url": "{{ url($article->path()) }}",
   "publisher":{
      "@type":"Organization",
      "name":"ivnanews",
      "logo":"https://www.ivnanews.ir/storage//photos/1/ivnanewsw.png"
   },
   "headline": "{{ $article->title }}",
   "mainEntityOfPage": "{{ url($article->path()) }}",
   "articleBody": "{{ $article->description }}",

   "image":[  @if(isset($article->image) && !empty($article->image))
            "{{ Storage::url($article->image) }}"
      @else
            "https://www.ivnanews.ir/storage//photos/1/ivna-..-site.png"
@endif
        ],

        "datePublished":"{{ $article->created_at }}"
}













    </script>


@endsection

@section('content')

    <body>
    <div class="news">
        <div class="new-container">
            <div class="row">
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="news-box">
                                <div class="bread-crumb">
                                    <ul>
                                        <li>
                                            <a href="{{ url('/') }}">صفحه اصلی</a>
                                            <i class="fas fa-chevron-left"></i>
                                        </li>
                                        @if(isset($journal->categories) && !empty($journal->categories))
                                            <li>

                                                @foreach ($journal->categories as $red => $category)
                                                    @if($red == 0)
                                                        <a href="{{ $category->path() }}">{{ $category->title }}</a>

                                                    @endif
                                                @endforeach


                                            </li>
                                        @endif
                                        <li>
                                            <a href="#">{{ $journal->title }}</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="news-detail">
                                    <div class="date">
                                        {{ $journal->timeHandler() }}
                                    </div>
                                    <div class="news-code">
                                        <span class="code">کد خبر:</span>
                                        {{ $journal->code }}
                                    </div>

                                    <div class="share">
                                        <a href="">
                                            <i class="fa fa-whatsapp"></i>
                                        </a>
                                        <a href="">
                                            <i class="fa fa-telegram"></i>
                                        </a>
                                        <a href="">
                                            <i class="fa fa-envelope-o"></i>
                                        </a>
                                        <a href="">
                                            <i class="fa fa-save"></i>
                                        </a>
                                        <a href="">
                                            <i class="fa fa-print"></i>
                                        </a>
                                    </div>
                                </div>

                                <div class="news-titr">
                                    @if(isset($journal->head_title) && !empty($journal->head_title))
                                        <p>
                                            {{ $journal->head_title }}
                                        </p>
                                    @endif
                                </div>
                                <div class="news-title">
                                    <h1>
                                        <a href="#">
                                            {{ $journal->title }}
                                        </a>
                                    </h1>
                                </div>
                                <div class="news-items">
                                    <div class="news-image">
                                        <img src="{{ \Illuminate\Support\Facades\Storage::url($journal->image) }}"
                                             alt="{{ $journal->title }}" height="120" width="180"/>
                                    </div>
                                    <div class="news-caption">
                                        <div class="news-lead">
                                            <p>
                                                {{ $journal->description }}                                            </p>
                                        </div>
                                        <div class="news-desc">

                                            {!! $journal->body !!}


                                            @if(isset($journal->images) && !empty($journal->images) && count($journal->images) > 0)
                                                @foreach($journal->images as $jot)
                                                <a href="{{ Storage::url($jot->src) }}">
                                                    <img src="{{ Storage::url($jot->src) }}" alt="{{ $journal->title  }}">
                                                </a>
                                                @endforeach
                                            @endif




                                            @if(isset($journal->galleries) && !empty($journal->galleries) && count($journal->galleries) > 0)

                                                @foreach($journal->galleries as $gallery)
                                                    <div class="gallery-box">
                                                        @foreach($gallery->images as $image)
                                                            <div class="gallery_item">
                                                                <a href="{{ \Illuminate\Support\Facades\Storage::url($image->src) }}">
                                                                    <img
                                                                        src="{{ \Illuminate\Support\Facades\Storage::url($image->src) }}"
                                                                        alt="{{ $image->title }}">
                                                                </a>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                @endforeach
                                            @endif

                                            @include('site.inc.videos-box' , ['videos' => $journal->videos])

                                            @include('site.inc.body-tags' , ['tags' => $journal->tags])

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Similar News-->
                            @if(isset($similars) && !empty($similars) && count($similars) > 0)
                                <div class="related-news">
                                    @include('site.inc.news-ul' , ['title' => 'اخبار مرتبط' , 'news' => $similars])
                                </div>
                            @endif

                        <!-- Similar News-->

                            @if(isset($comments) && !empty($comments))
                                @include('site.inc.comments' , ['object' => $journal , 'comments' => $comments])
                            @endif
                        </div>
                        <div class="col-md-4">
                            @if(isset($latests) && !empty($latests) && count($latests) > 0)
                                <div class="top-news">
                                    @include('site.inc.news-ul' , ['title' => 'آخرین اخبار' , 'news' => $latests])
                                </div>
                            @endif

                            <div class="newspaper">

                                <img src="{{ url('ivna-theme') }}/images/newspapers.jpg" height="120" width="180"/>
                            </div>
                            @if(isset($most_viewed) && !empty($most_viewed) && count($most_viewed) > 0)
                                <div class="most-visited">
                                    @include('site.inc.news-ul' , ['title' => 'اخبار پر بازدید' , 'news' => $most_viewed])
                                </div>
                            @endif
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

@section('scripts')
    <script>
        $(document).on('click', '.reply_this', function () {

            var parent = $(this).data('parent');


            $('#parent_change').val(parent);


            $('html, body').animate({
                scrollTop: $("#comment_form").offset().top
            }, 1000);
        });

        $('.visuhide').click(function () {
            $(this).parent().parent().submit();
        });

    </script>

    <script>
        $(document).ready(function () {
            $('#print').click(function () {

                window.print();
            });
        });
    </script>
@endsection
