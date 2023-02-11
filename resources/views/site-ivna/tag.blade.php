@extends('site.layout.master')



@section('seos')


<title>
    {{ $tag->title }}
</title>
    <meta http-equiv="content-language" content="fa" />
    <meta name="dc.publisher" content="@lang('site.site_name')" />
    <meta name="dc.identifier" content="https://www.ivnanews.ir" />
    <meta name="copyright" content="©2021 ivnanews Agency (www.ivnanews.ir)" />
    <meta itemprop="inLanguage" content="fa" />
    <meta itemprop="name" content="@lang('site.site_name')" />




    <meta itemprop="description" content="{{ $tag->description }}" />



    <link rel="alternate" hreflang="fa" href="{{ $tag->path() }}"/>
    <link rel="canonical" href="{{ $tag->path() }}" >


    <meta property="og:title" itemprop="headline" content="{{ $tag->title }}" />

    <meta property="og:type" content="article" />
    <meta property="og:url" content="{{ $tag->path() }}" />
    <meta property="og:description" itemprop="description" content="{{ $tag->description }}" />
    <meta property="og:site_name" content="@lang('site.site_name')" />
    <meta property="og:locale" content="fa_IR" />

    <meta name="twitter:card" content="article" />
    <meta name="twitter:title" content="@lang('site.seo_archive_page')" />
    <meta name="twitter:description" content="{{ $tag->description }}"/>

    <meta name="description" content="{{ $tag->description }}" />
    <meta name="dc.identifier"
          content="{{ $tag->path() }}" />

@endsection

@section('stylus')

    <link rel="stylesheet" href="{{ url('ivna-theme') }}/assets/sass/news-service.css">
@endsection

@section('content2')

  <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-8">
                    <div class="category_box">
    <h1>{{ $tag->title }}</h1>
    <p>
        {{ $tag->description }}
    </p>
</div>

<main class="main">
        @if(isset($news) && !empty($news))
            <div class="container">


                <div class="row">
                    <div class="box5">
                        <p class="title title-box">

 <h3 class="title title-box">
                             <span>


                   آخرین اخبار در برچسب
                   <b>{{ $tag->title }}</b>
                        </span>
 </h3>


                        </p>
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
<div class="pagination-sahand">
     {!! $news->appends(request()->except('page'))->links() !!}
</div>

                        </div>


                    </div>
                </div>
            </div>

        @endif
    </main>
</div>
<div class="col-xs-12 col-sm-4">
    @if(isset($taggs) && !empty($taggs))
    <div class="tag_box">
        <h3 class="title title-box">
                             <span>


                    برچسب های پراستفاده
                        </span>
                                    </h3>
        <ul>
            @foreach($taggs as $ag)
            <li>
                <a href="{{ $ag->path()}}">
                    #{{ $ag->slug }}
                </a>
            </li>
            @endforeach
        </ul>
    </div>
    @endif

     @if (isset($latests) && !empty($latests) )
                            <div class="box3">

                                <h3 class="title title-box">
                          <span>
                       آخرین اخبار
                      </span>
                                </h3>


                                <div class="item-box1">
                                    @foreach($latests as $new)
                                        <div class="item4">
                                            <div class="title1">
                                                <h5><a href="{{ $new->path() }}"> <i
                                                            class="fas fa-caret-left"></i><span>
                                                        {{ $new->title }}
                                                        </span></a>
                                                </h5>

                                            </div>
                                        </div>
                                    @endforeach

                                    <div class="all-div"><a href="{{ route('site.blog') }}" class="all-btn">
                                            آرشیو
                                        </a></div>

                                </div>


                            </div>
                        @endif
</div>
</div>
</div>



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
                                <h1>{{ $tag->title }}</h1>
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
