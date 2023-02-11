@extends('site.layout.master')


@section('seos')


<title>{{ $article->title }}</title>
    <meta http-equiv="content-language" content="fa" />
    <meta name="dc.publisher" content="@lang('site.seo_first_page')" />
    <meta name="dc.identifier" content="https://www.sahandpress.ir" />
    <meta name="copyright" content="©2021 Sahandpress Agency (www.sahandpress.ir)" />
    <meta itemprop="inLanguage" content="fa" />
    <meta itemprop="name" content="{{ $article->title }}" />
    
    
    

    <meta itemprop="description" content="{{ $article->description }}" />
    <meta itemprop="image" content="{{ Storage::url($article->image) }}" />
    

    <link rel="alternate" hreflang="fa" href="{{ $article->path() }}"/>
    <link rel="canonical" href="{{ $article->path() }}" >
    

    <meta property="og:title" itemprop="headline" content="{{ $article->title }}" />
    
    <meta property="og:type" content="article" />
    <meta property="og:url" content="{{ $article->path() }}" />
    <meta property="og:description" itemprop="description" content="{{ $article->description }}" />
    <meta property="og:site_name" content="@lang('site.seo_first_page')" />
    <meta property="og:locale" content="fa_IR" />
    <meta property="og:article:author" content="@lang('site.seo_first_page')" />
    <!--<meta property="og:article:section" content="@if(isset($article->categories) && !empty($article->categories))-->
    <!--                        @foreach ($article->categories as $category)-->
    <!--                            <a href="{{ $category->path() }}">{{ $category->title }}</a>-->
    <!--                                           @endforeach-->

    <!--                    @endif" />-->
    <meta property="og:image" itemprop="image" content="{{ Storage::url($article->image) }}" />

    <meta name="twitter:card" content="article" />
    <!--<meta name="twitter:site" content="@FarsNews_Agency" />-->
    <meta name="twitter:title" content="{{ $article->title }}" />
    <meta name="twitter:description" content="{{ $article->description }}"/>
    <meta name="twitter:image" content="{{ Storage::url($article->image) }}" />

    <meta itemprop="datePublished" property="article:published_time" content="{{ $article->created_at }}" />
    <meta itemprop="dateModified" property="article:modified" content="{{ !empty($article->updated_at) ? $article->updated_at  : $article->created_at }}" />
    <meta name="thumbnail" itemprop="thumbnailUrl" content="{{ Storage::url($article->image) }}" />
    <meta name="genre" itemprop="genre" content="News" />
 @if(isset($article->tags) && !empty($article->tags) && count($article->tags) > 0 )

    <meta name="keywords" content="@foreach($article->tags as $key => $tag){{ $tag->title }}{{ $key+1!=count($article->tags)?',':''}}@endforeach"/>
    @endif
    <meta name="description" content="{{ $article->description }}" />
    <!--<meta name="dc.Date" scheme="ISO8601" content="8/11/2021 10:12:53 AM" />-->
    <meta name="dc.identifier"
          content="{{ $article->path() }}" />
    <!--<meta name="Fna.oid" content="14000520000162" />-->



<script type="application/ld+json">
{
   "@context": "https://schema.org",
   "@type": "NewsArticle",
   "url": "{{ url($article->path()) }}",
   "publisher":{
      "@type":"Organization",
      "name":"Sahandpress",
      "logo":"https://www.sahandpress.ir/storage//photos/1/Sahandpressw.png"
   },
   "headline": "{{ $article->title }}",
   "mainEntityOfPage": "{{ url($article->path()) }}",
   "articleBody": "{{ $article->description }}",
 
   "image":[  @if(isset($article->image) && !empty($article->image))
      "{{ Storage::url($article->image) }}"
      @else
      "https://sahandpress.ir/site-theme/images/inten/default-image.png"
 @endif
   ],
  
   "datePublished":"{{ $article->created_at }}"
}
</script>


@endsection

@section('content')


    <section id="news-page-top">
        <div class="container">

            <div class=" row">
                <div class="col-xs-12 col-sm-2">
                    <div class="news-code">
                        <span
                            class="news_nav_title"> 				                     کد خبر:                  			</span>
                        <span class="news_number">
                        {{ $article->code }}
                    </span>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <div class="news_home_link">
                        <i class="fa fa-link" aria-hidden="true"></i>
                        <span>لینک کوتاه:</span>

                        <a href="{{ url('/' . $article->short ) }}" class="link_en" target="_blank"
                           rel="nofollow">{{ url('/' . $article->short ) }}</a>

                    </div>
                </div>

                <div class="col-xs-12 col-sm-4">
                     <div class="date-news">
                       
                  </span>


                    </div>
                    <div class="date-news">
                        <ul>
                            <li>
                                 <i class="fa fa-eye"></i>
                        <span class="news_nav_title">بازدید: </span>
                        <span>
                                       {{ $view }}
                                </li>
                                <li> 
                                <i class="fa fa-calendar"></i>
                        <span class="news_nav_title">تاریخ انتشار: </span>
                        <span>
                                       {{ $article->timeHandler() }}
                  </span>
                                 </li>    
                            </ul>
                       


                    </div>

                </div>


            </div>


            <div class="row border-news">
                
                <div class="col-xs-12 col-sm-8">
                    <div class="news_path">
                        <ul>
                            <li>
                                <a href="{{ url('/') }}">صفحه اصلی</a>   <span>      <i class="fas fa-chevron-left"></i>    </span>
                            </li>
                              @if(isset($article->categories) && !empty($article->categories))
                            <li>
                               
                            @foreach ($article->categories as $red => $category)
                            @if($red == 0)
                                <a href="{{ $category->path() }}">{{ $category->title }}</a>
                       <span><i class="fas fa-chevron-left"></i>  </span> 
@endif
                            @endforeach

                       
                            </li>
                             @endif
                             <li>
                                  <a class="bold_bread" href="#">{{ $article->title }}</a> 
                                  </li>
                            </ul>
                        
                       
                        
                           
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4 ">
                    <ul class="ul-news ">
                        <li>
                            <div title="نسخه چاپی" class="news_print_botton"><a href="javascript:void(0)" id="print"><i
                                        class="fa fa-print"></i></a></div>
                        </li>
                        <li>
                            <div title="ارسال به دوستان" class="news_emails_botton" onclick=""><a
                                    href="mailto:?subject={{ $article->title }}&amp;body={{ $article->path() }}"><i
                                        class="fas fa-envelope"></i></a></div>
                        </li>
                        <li><a title="ذخیره" class="news_save_botton" href=""> <i class="fas fa-save"></i></a></li>
                        <li><a class="sn_telegram" href="https://t.me/share/url?url={{ url($article->path()) }}"><i
                                    class="far fa-paper-plane"></i></a></li>
                          <li><a class="sn_telegram" href="whatsapp://send?text={{ url($article->path()) }}"><i
                                    class="fab fa-whatsapp"></i></a></li>
                            <li><a class="sn_telegram" href="https://twitter.com/intent/tweet?text={{ url($article->path()) }}"><i
                                    class="fab fa-twitter"></i></a></li>
                                              
                                   <li><a class="sn_telegram" href="http://www.linkedin.com/shareArticle?mini=true&amp;url={{ url($article->path()) }}&amp;title={{ $article->title }}&amp;source={{ url('/') }}"><i
                                    class="fab fa-linkedin"></i></a></li>     
                    </ul>
                </div>
            </div>

        </div>
    </section>

    <section id="news-page">
        <div class="container">

            <div class=" row">
                <!--                <div class="col-xs-12 col-sm-1 hidden-xs">
                                    <div class="adv-news"></div>
                                </div>-->

   <div class="col-md-25">
                    
                     
                           @if(isset($most_viewed) && !empty($most_viewed))
                                <div class="box3">
                                    <h3 class="title title-box">
                             <span>
                       پربازدیدترین اخبار
                         </span>
                                    </h3>

                                    <div class="item-box1">
                                        @foreach ($most_viewed as $new )

                                            <div class="item4">
                                                <div class="title1">
                                                    <h5><a href="{{  $new->article->path() }}"> <i class="fas fa-caret-left"></i><span>  {{  $new->article->title  }}</span></a>
                                                    </h5>
                                                </div>
                                            </div>

                                        @endforeach


                                        <div class="all-div"><a href="{{ route('site.blog') }}" class="all-btn" style=" background: #012b81; color: white;">
                                                آرشیو
                                            </a></div>

                                    </div>
                                </div>
                            @endif  
                            
                </div>
                <div class="col-md-75">
                    <div id="main1" class="news-bor">
                        <h3 class="title-main">

                        </h3>

                        <div class="row boder4-xs">
                          
                            <div class="col-md-12">
                                <div class="row">
                                  
                                    <div class="col-md-4">
                                        <x-site.tools.image :image="$article"
                                                            class="bg-movei-lnk"></x-site.tools.image>
                                    </div>
                                    <div class="col-md-8">
<h5 class="head_title" style="color:#012b81;">{{ $article->head_title }}</h5>
                                        <h1 itemprop="headline" class="main_titlee">
                                            <a href="{{ $article->path() }}" style="color: #012b81;">
                                                {{ $article->title }}
                                            </a>
                                        </h1>
                                        <p  itemprop="description" class="summary-text">
                                            {{ $article->description }}
                                        </p>
                                            <x-site.widget.like :id="$article->id" :type="get_class($article)"></x-site.widget.like>

                                          


                                    </div>
                                </div>


                            </div>
                         



                        </div>
                        <br>
                        <br>
                        <div class=" boder4-xs">
                            <div class="col-md-12 box-content">
<div itemprop="articleBody">
                                @if (isset($article->image2) && !empty($article->image2))
                                    <img class="big_main"
                                         src="{{ \Illuminate\Support\Facades\Storage::url($article->image2) }}"
                                         alt="{{ $article->title }}">

                                @endif

                               @if(isset($similars_tags) && !empty($similars_tags) && count($similars_tags) > 0 )
                                            @php
                                            $dom = new DOMDocument();
                                             @ $dom->loadHTML( '<?xml encoding="utf-8" ?>' . $article->body);

                                        $documentElement = $dom->documentElement;

$p = $dom->getElementsByTagName('p');


$i =0;

foreach ($p as $key => $item){


if (fmod($key ,5) == 0){

if (isset($similars_tags[$i]) && !empty($similars_tags[$i]) &&  !empty($similars_tags[$i]->title) && isset($similars_tags[$i]->title) ) {





@  $html_to_add = '<div class="between_links">
بیشتر بخوانید :
<a href="'.$similars_tags[$i]->path().'">'.$similars_tags[$i]->title.'</a></div>';


$dom_to_add = new DOMDocument();
$dom_to_add->loadHTML('<?xml encoding="utf-8" ?>' .$html_to_add);
$new_element = $dom_to_add->documentElement;

$imported_element = $dom->importNode($new_element, true);
$item->parentNode->insertBefore($imported_element, $item->nextSibling);

$i++;

}
else{
break;
}
}



}
@  $output = $dom->saveHTML();

echo $output;


                                        @endphp

                                            @else
                                            {!! $article->body !!}

                                            @endif



                            </div>

                            @if (isset($article->videos[0]) && !empty($article->videos[0]))
                                <div class="video_article">
                                    <video controls>
                                        <source
                                            src="{{ \Illuminate\Support\Facades\Storage::url($article->videos[0]->src) }}"
                                            type="video/mp4">

                                    </video>
                                </div>
                            @endif
</div>
                            <div class="row">
                                @if(isset($article->tags) && !empty($article->tags) && count($article->tags) > 0 )
                                    <div class="col-md-12 labels">
                                        <ul>
                                            <li>
                                                <label> <i class="fa fa-tags"></i> برچسب ها : </label>
                                            </li>

                                            @foreach($article->tags as $tag)

                                                <li class="tag">
                                                    <span><a href="{{ $tag->path() }}">{{ $tag->title }}</a></span>
                                                </li>

                                            @endforeach


                                        </ul>
                                    </div>
                                @endif
                            </div>
                            
                            
                               @if(isset($similars) && !empty($similars))
                                <div class="box3">
                                    <h3 class="title title-box">
                             <span>
                        اخبار مشابه
                         </span>
                                    </h3>

                                    <div class="item-box1">
                                        @foreach ($similars as $new )

                                            <div class="item4">
                                                <div class="title1">
                                                    <h5><a href="{{  $new->path() }}"> <i class="fas fa-caret-left"></i><span>  {{  $new->title  }}</span></a>
                                                    </h5>
                                                </div>
                                            </div>

                                        @endforeach


                                        <div class="all-div"><a href="{{ route('site.blog') }}" class="all-btn" style=" background: #012b81; color: white;">
                                                آرشیو
                                            </a></div>

                                    </div>
                                </div>
                            @endif
                            
                            
                            
                            
                            <br>

                            @if(1)
                            <!--End Similar post -->
                                <x-site.news.comments :comments="$comments" :object="$article"></x-site.news.comments>
                            @endif



                            
                            
                            <br>
                        </div>
                        
                        
                      
                            
                    </div>


                </div>
                <div class="col-md-25">
                    
                     
                           @if(isset($latests) && !empty($latests))
                                <div class="box3">
                                    <h3 class="title title-box">
                             <span>
                       آخرین اخبار
                         </span>
                                    </h3>

                                    <div class="item-box1">
                                        @foreach ($latests as $new )

                                            <div class="item4">
                                                <div class="title1">
                                                    <h5><a href="{{  $new->path() }}"> <i class="fas fa-caret-left"></i><span>  {{  $new->title  }}</span></a>
                                                    </h5>
                                                </div>
                                            </div>

                                        @endforeach


                                        <div class="all-div"><a href="{{ route('site.blog') }}" class="all-btn" style=" background: #012b81; color: white;">
                                                آرشیو
                                            </a></div>

                                    </div>
                                </div>
                            @endif  
                            
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
        $(document).ready(function () {
            $('#print').click(function () {

                window.print();
            });
        });
    </script>
@endsection
