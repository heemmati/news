@extends('site.layout.master')

@section('seos')


    <title>{{ $page->title }}</title>
    <meta http-equiv="content-language" content="fa"/>
    <meta name="dc.publisher" content="@lang('site.seo_first_page')"/>
    <meta name="dc.identifier" content="https://www.ivnanews.ir"/>
    <meta name="copyright" content="©2021 ivnanews Agency (www.ivnanews.ir)"/>
    <meta itemprop="inLanguage" content="fa"/>
    <meta itemprop="name" content="{{ $page->title }}"/>




    <meta itemprop="description" content="{{ $page->description }}"/>
    <meta itemprop="image" content="{{ Storage::url($page->image) }}"/>


    <link rel="alternate" hreflang="fa" href="{{ $page->path() }}"/>
    <link rel="canonical" href="{{ $page->path() }}">


    <meta property="og:title" itemprop="headline" content="{{ $page->title }}"/>

    <meta property="og:type" content="article"/>
    <meta property="og:url" content="{{ $page->path() }}"/>
    <meta property="og:description" itemprop="description" content="{{ $page->description }}"/>
    <meta property="og:site_name" content="@lang('site.seo_first_page')"/>
    <meta property="og:locale" content="fa_IR"/>
    <meta property="og:article:author" content="@lang('site.seo_first_page')"/>
    <!--<meta property="og:article:section" content="@if(isset($page->categories) && !empty($page->categories))-->
    <!--                        @foreach ($page->categories as $category)-->
    <!--                            <a href="{{ $category->path() }}">{{ $category->title }}</a>-->
    <!--                                           @endforeach-->

    <!--                    @endif" />-->
    <meta property="og:image" itemprop="image" content="{{ Storage::url($page->image) }}"/>

    <meta name="twitter:card" content="article"/>
    <!--<meta name="twitter:site" content="@FarsNews_Agency" />-->
    <meta name="twitter:title" content="{{ $page->title }}"/>
    <meta name="twitter:description" content="{{ $page->description }}"/>
    <meta name="twitter:image" content="{{ Storage::url($page->image) }}"/>

    <meta itemprop="datePublished" property="article:published_time" content="{{ $page->created_at }}"/>
    <meta itemprop="dateModified" property="article:modified"
          content="{{ !empty($page->updated_at) ? $page->updated_at  : $page->created_at }}"/>
    <meta name="thumbnail" itemprop="thumbnailUrl" content="{{ Storage::url($page->image) }}"/>
    <meta name="genre" itemprop="genre" content="News"/>
    @if(isset($page->tags) && !empty($page->tags) && count($page->tags) > 0 )

        <meta name="keywords"
              content="@foreach($page->tags as $key => $tag){{ $tag->title }}{{ $key+1!=count($page->tags)?',':''}}@endforeach"/>
    @endif
    <meta name="description" content="{{ $page->description }}"/>
    <!--<meta name="dc.Date" scheme="ISO8601" content="8/11/2021 10:12:53 AM" />-->
    <meta name="dc.identifier"
          content="{{ $page->path() }}"/>
    <!--<meta name="Fna.oid" content="14000520000162" />-->



    <script type="application/ld+json">
{
   "@context": "https://schema.org",
   "@type": "NewsArticle",
   "url": "{{ url($page->path()) }}",
   "publisher":{
      "@type":"Organization",
      "name":"ivnanews",
      "logo":"https://www.ivnanews.ir/storage//photos/1/ivnanewsw.png"
   },
   "headline": "{{ $page->title }}",
   "mainEntityOfPage": "{{ url($page->path()) }}",
   "articleBody": "{{ $page->description }}",

   "image":[  @if(isset($page->image) && !empty($page->image))
            "{{ Storage::url($page->image) }}"
      @else
            "https://www.ivnanews.ir/storage//photos/1/ivna-..-site.png"
@endif
        ],

        "datePublished":"{{ $page->created_at }}"
}













    </script>


@endsection



@section('content')


    <section id="news-page-top">
        <div class="container">

            <div class=" row">

                <div class="col-xs-12 col-sm-4">
                    <div class="date-news">
                        <i class="fa fa-calendar"></i>
                        <span class="news_nav_title">تاریخ انتشار: </span>
                        <span>
                                      {{ $page->timeHandler() }}
                  </span>


                    </div>

                </div>


            </div>



        </div>
    </section>

    <section id="news-page">
        <div class="container">

            <div class=" row">
                <div class="col-xs-12 col-sm-1 hidden-xs">
                    <div class="adv-news"></div>
                </div>



                <div class="col-xs-12 col-sm-10">
                    <div id="main1">
                        <h3 class="title-main">

                        </h3>

                        <div class="row boder4-xs">
                            <div class="col-md-8">

                                <h2>
                                    <a href="{{ $page->path() }}" style="color: #ab0000;">
                                        {{ $page->title }}
                                    </a>
                                </h2>

                            </div>
                            <div class="col-md-4">
                                <x-site.tools.image :image="$page"
                                                    class="bg-movei-lnk"></x-site.tools.image>
                            </div>
                        </div>
                        <div class=" boder4-xs">
                            <div class="col-md-12 box-content">

                                {!! $page->body !!}
                            </div>

                            <div class="row">
                                @if(isset($page->tags) && !empty($page->tags) && count($page->tags) > 0 )
                                    <div class="col-md-12 labels">
                                        <ul>
                                            <li>
                                                <label> <i class="fa fa-tags"></i> برچسب ها : </label>
                                            </li>

                                            @foreach($page->tags as $tag)

                                                <li class="tag">
                                                    <span><a href="{{ $tag->path() }}">{{ $tag->title }}</a></span>
                                                </li>

                                            @endforeach



                                        </ul>
                                    </div>
                                @endif
                            </div>
                            <br>


                            <br>
                        </div>
                    </div>


                </div>
            </div>
    </section>

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
        $(document).ready(function (){
            $('#print').click(function (){

                window.print();
            });
        });
    </script>
@endsection
