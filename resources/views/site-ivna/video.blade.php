@extends('site.layout.master')

@section('stylus')

    <link rel="stylesheet" href="{{ url('ivna-theme') }}/assets/sass/single-film.css">
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

    <div class="film">
        <div class="new-container">
            <div class="row">
                <div class="col-md-9">
                    <div class="film-box">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="film-caption">
                                    <div class="film-title">
                                        <h1>
                                            {{ $article->title }}
                                        </h1>
                                    </div>
                                    @if(isset($article->head_title) && !empty($article->head_title))
                                        <div class="film-titr">
                                            <p>
                                                {{ $article->head_title }}
                                            </p>
                                        </div>
                                    @endif

                                    <div class="film-desc">
                                        <p>

                                            {{ $article->description }}

                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="details">
                                    <div class="date">
                                        <i class="fa fa-clock"></i>
                                        <span class="time">
                                        {{ $article->timeHandler() }}
                                        </span>
                                    </div>
                                    <div class="news-code">
                                        <i class="fa fa-file-alt"></i>
                                        <span class="code-number">{{ $article->code }}</span>
                                    </div>

                                </div>
                                <div class="film-image">
                                    <a href="{{ \Illuminate\Support\Facades\Storage::url($article->image) }}">
                                        <img src="{{ \Illuminate\Support\Facades\Storage::url($article->image) }}"
                                             height="417" width="626"
                                             alt="{{ $article->title }}"
                                        />
                                    </a>
                                </div>
                                <div class="description">
                                    <div class="comment">
                                        <i class="fa fa-comments"></i>
                                        <a href="#opinion">
                                            <span>نظر دادن</span>
                                        </a>
                                    </div>
                                    <div class="share">
                                        <i class="fa fa-share-alt"></i>
                                        <a href="#share-icons">
                                            <span>اشتراک گذاری</span>
                                        </a>
                                    </div>
                                    <div class="download">
                                        <i class="fa fa-download"></i>
                                        <span> دانلود pdf</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="video">
                        @if(isset($article->videos) && !empty($article->videos) && count($article->videos))
                            @foreach($article->videos as $video)
                                <video controls>
                                    <source src="{{ \Illuminate\Support\Facades\Storage::url($video->src) }}"
                                            type="video/mp4">

                                </video>

                                <div class="video-btn">
                                    <div class="download-video">
                                        <a href="{{ \Illuminate\Support\Facades\Storage::url($video->src) }}" download>
                                            <i class="fa fa-download"></i>
                                            دانلود
                                        </a>
                                    </div>
                                    <div class="video-code">
                                        <button>
                                            <i class="fa fa-file-code"></i>
                                            عنوان ویدئو
                                        </button>
                                        <p>{{ $video->title }}</p>
                                    </div>
                                </div>

                            @endforeach
                        @endif
                    </div>

                    <div class="share-video">
                        @if(isset($article->short) && !empty($article->short))
                            <div class="short-link">
                                <button onclick="myFunction()">
                                    <i class="fa fa-link"></i>
                                    <input type="text" value="{{ url($article->short) }}" id="myInput">
                                </button>

                                <!-- The button used to copy the text -->
                            </div>
                        @endif
                        <div class="share-icons" id="share-icons">
                            <a href=""><i class="fa fa-whatsapp"></i></a>
                            <a href=""><i class="fa fa-telegram"></i></a>
                            <a href=""> <i class="fa fa-facebook"></i></a>
                            <a href=""> <i class="fa fa-linkedin"></i></a>
                        </div>
                    </div>
                    @if(isset($similars) && !empty($similars) && count($similars) > 0)
                        <div class="related-films">
                            <div class="related-title">
                                <i class="fa fa-circle"></i>
                                <h2>
                                    فیلم های مرتبط
                                </h2>
                            </div>
                            <div class="row">
                                @foreach($similars as $similar)
                                    <div class="col-md-4">
                                        <div class="related-box">
                                            <i class="fa fa-circle"></i>
                                            <a href="{{ $similar->path() }}">
                                                <h2>
                                                    {{ $similar->title }}
                                                </h2>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    @if(isset($similars_tags) && !empty($similars_tags) && count($similars_tags) > 0)
                        <div class="proposed-films">
                            <div class="proposed-title">
                                <i class="fa fa-circle"></i>
                                <h2>
                                    فیلم های پیشنهادی
                                </h2>
                            </div>
                            <div class="row">
                                @foreach($similars_tags as $simi)
                                <div class="col-md-3">
                                    <div class="proposed-box">

                                        <a href="{{ $simi->path() }}">
                                            <img src="{{ \Illuminate\Support\Facades\Storage::url($simi->image) }}"
                                                 alt="{{ $simi->title }}"
                                                 height="417" width="626"/>
                                        </a>
                                    </div>
                                </div>
                                @endforeach

                            </div>
                        </div>
                    @endif


                    @include('site.inc.comments2' , ['object' => $article , 'comments' => $comments])



                </div>
                <div class="col-md-3">
                    <div class="most-visited-films">
                        <div class="last-film-title">
                            <i class="fa fa-circle"></i>
                            <h2>
                                پر بیننده ترین ها
                            </h2>
                        </div>

                        <ul>
                            @foreach($most_viewed as $mvi)
                                <li>
                                    <i class="fa fa-circle"></i>
                                    <a href="{{ $mvi->article->path() }}">
                                        {{ $mvi->article->title }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>

                    </div>
                    <div class="last-films">
                        <div class="last-film-title">
                            <i class="fa fa-circle"></i>
                            <h2>
                                آخرین فیلم ها
                            </h2>
                        </div>

                        <ul>
                            @foreach($latests as $lat)
                                <li>
                                    <i class="fa fa-circle"></i>
                                    <a href="{{ $lat->path() }}">
                                        {{ $lat->title }}                                </a>
                                </li>
                            @endforeach
                        </ul>

                    </div>
                </div>
            </div>

        </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
            crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script>
    <script src="../bootstrap/bootstrap-5.1.0-dist/bootstrap-5.1.0-dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
            integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
            crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
            integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        function myFunction() {
            /* Get the text field */
            var copyText = document.getElementById("myInput");

            /* Select the text field */
            copyText.select();
            copyText.setSelectionRange(0, 99999); /* For mobile devices */

            /* Copy the text inside the text field */
            navigator.clipboard.writeText(copyText.value);

            /* Alert the copied text */
            alert("Copied the text: " + copyText.value);
        }
    </script>
    <script>
        $(document).ready(function () {
            $("button").click(function () {
                $("p").slideToggle();
            });
        });
    </script>
    </body>
@endsection
