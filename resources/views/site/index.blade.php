@extends('site.layout.master')

@section('seos')

  <title>@lang('site.seo_first_page')</title>
    
    <meta name="description" content="@lang('site.seo_first_description')" />
    
    <link rel="alternate" hreflang="fa" href="https://www.sahandpress.ir" />
    
    <meta http-equiv="content-language" content="fa" />
    
    <meta name="keywords" content="@lang('seo_first_keywords')" />
    
    <meta name="dc.publisher" content="@lang('site.seo_first_page')" />
    <meta name="dc.identifier" content="https://www.sahandpress.ir" />
    <meta name="copyright" content="©2021 Sahand Press Agency (www.sahandpress.ir)" />
    <!--<meta name="dcterms.created" content="2002-10-14T15:24:23+00:00" />-->
    <!--<meta name="dcterms.modified" content="2021-08-11 T 09:22:56 +0430" />-->
    <meta itemprop="name" content="@lang('site.seo_first_page')" />
    <meta itemprop="description" content="@lang('site.seo_first_description')" />
    <meta itemprop="image" content="https://www.sahandpress.ir/storage//photos/1/Sahandpressw.png" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="@lang('site.seo_first_page')" />
    <meta name="twitter:description" content="" />
    <meta name="twitter:site" content="@FarsNews_Agency" />
    <meta name="twitter:image:src" content="https://www.sahandpress.ir/storage//photos/1/Sahandpressw.png" />
    <meta name="twitter:image" content="https://www.sahandpress.ir/storage//photos/1/Sahandpressw.png" />
    <meta name="twitter:image:alt" content="@lang('site.seo_first_page')" />
    <meta name="twitter:domain" content="https://www.sahandpress.ir" />
    <meta property="og:title" content="@lang('site.seo_first_page')" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://www.sahandpress.ir" />
    <meta property="og:image" content="https://www.sahandpress.ir/storage//photos/1/Sahandpressw.png" />
    <meta property="og:description" content="@lang('site.seo_first_description')" /> 
    <meta property="og:site_name" content="@lang('seo_site_name')" />
    <meta property="article:published_time" content="2021-08-11 T 09:22:56 +0430" />
    <meta name="date" content="2021-08-11 T 09:22:56 +0430" />
    <meta property="og:locale" content="fa_IR" />
    <meta property="og:article:author" content="@lang('site.seo_first_page')" />
    <meta property="og:article:section" content="صفحه نخست" />
    <meta name="generator" content="https://www.sahandpress.ir" />
    <meta name="language" content="fa" />
    <meta name="rating" content="General" />
    <meta name="expires" content="never" />
    <meta name="robots" content="INDEX,FOLLOW" />
    <meta name="publisher" content="@lang('site.seo_first_page')" />
    <link rel="canonical" href="https://www.sahandpress.ir/" />
    
    
    
@endsection

@section('content')

<div class="container">
    <div class="row">
     <div class="col-xs-12 col-sm-9">
          {{-- Main Section --}}
    <section id="main0">
         <h3 class="title title-box">
                             <span>
                                    سرتیتر اخبار
                         </span>
                                    </h3>
            <div class="row">
                <div class="col-xs-12 col-sm-12">
                    
                    <div id="blog-item">
                        
                        @if(isset($bignews) && !empty($bignews))
                            <div class="large-12 columns ">
                                <div class="owl-carousel owl-theme row-item1 ">
                                    @foreach($bignews as $key => $new)
                                        <div class="item col">
                                            <div class="item1">
                                                <div class="post-img">
                                                      <x-site.tools.image :image="$new" class="bg-movei-lnk"></x-site.tools.image>
                                                </div>
                                                <div class="des1-item">
                                                    <h3>
                                                        <a href="{{  $new->path() }}">{{ $new->title }}</a>
                                                    </h3>
                                                 
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach


                                </div>
                            </div>





                    @endif
                </div>
                </div>

                
            </div>

    </section>







    <section class="main">
        @if(isset($importants) && !empty($importants))
                <div class="row">
                    <h3><span>اخبار ویژه</span></h3>
                    <div id="demos" class="col-xs-12">
                        <div class="large-12 columns important_news">
                            <div class="owl-carousel owl-theme demos">
                                @foreach($importants as $new)


                                    <div class="item">

                                        <div class="item2">
                                            <div class="item-image">
                                                <x-site.tools.image :image="$new"
                                                                    class="bg-movei-lnk"></x-site.tools.image>
                                            </div>
                                            <div class="description1">
                                                <div class="title">
                                                    <h4>
                                                        <a href="{{ $new->path() }}">
                                                            {{ $new->title }}
                                                        </a>
                                                    </h4>
                                                </div>
                                                <!--<div class="desc">-->
                                                <!--    <p>-->
                                                <!--          {{ \Illuminate\Support\Str::limit($new->description , 90 )  }}-->
                                                <!--    </p>-->
                                                <!--</div>-->
                                            </div>
                                        </div>
                                    </div>

                                @endforeach


                            </div>


                        </div>

                    </div>
                 


                </div>
   @endif
    </section>

    <section class="main1 main1-page1">

         

                    <div class="row">


                       

                        <div class="col-xs-12 col-sm-3">
                           @if(isset($mcomments) && !empty($mcomments))
                                <div class="box3">
                                    <h3 class="title title-box">
                             <span>
                                    پربحث ترین اخبار
                         </span>
                                    </h3>

                                    <div class="item-box1">
                                        @foreach ($mcomments as $mvi )

                                            <div class="item4">
                                                <div class="title1">
                                                    <h5><a href="{{  $mvi->article->path() }}"> <i class="fas fa-caret-left"></i><span>  {{  $mvi->article->title  }}</span></a>
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
                        
                        
                        
                         <div class="col-xs-12 col-sm-6">
                            @if(isset($specifics) && !empty($specifics))

                                <div class="box1">
                                    <h3 class="title title-box">
                             <span>


                        پرسش و پاسخ
                        </span>
                                    </h3>
                                    <div>


                                        <div class="item-box1 ">
                                            @foreach($specifics as $key => $new)


                                                <div class="item3">
                                                    <div class="item-image">
                                                        <x-site.tools.image :image="$new"
                                                                            class="bg-movei-lnk"></x-site.tools.image>
                                                    </div>
                                                    <div class="description3">

                                                        <div class="desc">
                                                            <h4>
                                                                <a href="{{ $new->path() }}">
                                                                    
{{ $new->title }} 
                                                                </a>
                                                            </h4>
                                                        </div>

                                                        <div class="title">
                                                            <p>
                                                                <a href="{{ $new->path() }}">
                                                                  
                                                                    {{ \Illuminate\Support\Str::limit($new->description , 200 )  }}
                                                                </a>
                                                            </p>
                                                        </div>

                                                    </div>

                                                </div>
                                                    @endforeach









                                                <div class="all-div">
                                                    <a href="{{ route('site.blog') }}" class="all-btn" style=" background: #012b81; color: white;">
                                                        آرشیو
                                                    </a></div>


                                        </div>

                                    </div>
                                </div>

                                    @endif


                                @if(isset($reports) && !empty($reports) && count($reports) > 0)
                                    <div class="box2">
                                        <h3 class="title title-box">
                              <span>
                            تحلیل و گزارش
                          </span>
                                        </h3>


                                        <div class="item-box1">
                                            @foreach ($reports as $key => $new )

                                                <div class="item3 {{  $key == count($reports) - 1 ? 'endl' : '' }}">
                                                    <div class="item-image">
                                                        <x-site.tools.image :image="$new"></x-site.tools.image>
                                                    </div>
                                                    <div class="description3">
                                                        <div class="desc">
                                                            <h4>
                                                                <a href="{{ $new->path() }}">

                                                               {{ $new->title }}
                                                              
                                                                </a>
                                                            </h4>
                                                        </div>

                                                        <div class="title">
                                                            <p>
                                                                <a href="{{ $new->path() }}">
                                                                    {{ \Illuminate\Support\Str::limit($new->description , 200 )  }}
                                                                </a>
                                                            </p>
                                                        </div>

                                                    </div>
                                                </div>

                                            @endforeach


                                            <div class="all-div"><a href="{{ route('site.blog') }}" class="all-btn" style=" background: #012b81; color: white;">
                                                    آرشیو
                                                </a></div>


                                        </div>


                                    </div>
                                @endif



  @if(isset($bottoms) && !empty($bottoms))
                            <div class="box5">
                                <h3 class="title title-box">
                             <span>


                         اخبار روز

                         </span>
                                </h3>
                                <div>


                                    <div class="item-box1">

                                        @foreach ($bottoms as $new)
                                            <div class="item3 end1">
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
   {{ \Illuminate\Support\Str::limit($new->description , 200 )  }}
   </p>
                                                    </div>
                                                </div>
                                            </div>

                                        @endforeach

                                        <div class="all-div"><a href="{{ route('site.blog') }}" class="all-btn" style=" background: #012b81; color: white;" >
                                                آرشیو
                                            </a></div>

                                    </div>

                                </div>


                            </div>
                        @endif
                        
                        

                        </div>
                        
                        <div class="col-xs-12 col-sm-3">
                           @if(isset($mviews) && !empty($mviews))
                                <div class="box3">
                                    <h3 class="title title-box">
                             <span>
                                      پربازدیدترین اخبار
                         </span>
                                    </h3>

                                    <div class="item-box1">
                                        @foreach ($mviews as $mvi )

                                            <div class="item4">
                                                <div class="title1">
                                                    <h5><a href="{{  $mvi->article->path() }}"> <i class="fas fa-caret-left"></i><span>  {{  $mvi->article->title  }}</span></a>
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
    
    
         </div>
    <div class="col-xs-12 col-sm-3">
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
   


</div>















@endsection
