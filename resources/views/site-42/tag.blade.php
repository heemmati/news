@extends('site.layout.master')



@section('seos')


<title>
    {{ $tag->title }}
</title>
    <meta http-equiv="content-language" content="fa" />
    <meta name="dc.publisher" content="@lang('site.site_name')" />
    <meta name="dc.identifier" content="https://www.techli.ir" />
    <meta name="copyright" content="©2021 techli Agency (www.techli.ir)" />
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


@section('content')

 <div class="container">
        <div class="row" id="content">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-8 middl">
                        @if(isset($bignews) && !empty($bignews) && count($bignews) > 0)

                            @if(isset($bignews[0]) && !empty($bignews[0]) )
                                <div class="box-one">
                                    <div class="flexslider" id="posts-box-1-widget-4">
                                        <ul class="slides">

                                            <li>
                                                <section class="box-content">
                                                    <div class="box-content-right">
                                                        <a href=""><img width="410" height="285"
                                                                        src="{{ $bignews[0]->picture() }}"
                                                                        alt="{{ $bignews[0]->title }}"
                                                                        title="{{ $bignews[0]->title }}"/></a>
                                                        <span
                                                            class="boxe-m-date">{{ $bignews[0]->timeHandler() }}</span>
                                                    </div>
                                                    <div class="box-content-left">
                                                        <h3 class="post-title2">
                                                            @if(isset($bignews[0]->head_title) && !empty($bignews[0]->head_title))
                                                            <small class=" text-muted"><i class="fa fa-stop"
                                                                                          aria-hidden="true"></i>
                                                                {{ $bignews[0]->head_title }}
                                                            </small>
                                                            @endif
                                                                
                                                            <a href="{{ $bignews[0]->path() }}">
                                                                {{ $bignews[0]->title }}
                                                            </a>
                                                        </h3>

                                                        <div class="post-excerpt2">
                                                            <p>
                                                                {{ $bignews[0]->description }}
                                                            </p>
                                                        </div>

                                                    </div>
                                                </section>
                                            </li>


                                        </ul>
                                    </div>
                                </div>
                            @endif
                            @if(isset($bignews[1]) && !empty($bignews[1]) )

                                <div class="box-tow">
                                    @foreach($bignews as $key => $big)
                                        @if($key > 0)
                                            <section class="box-content">
                                                <div class="box-content-right">
                                                    <a href=""><img width="410" height="285"
                                                                    src="{{ $big->picture() }}"
                                                                    alt="{{ $big->title }}"
                                                                    title="{{ $big->title }}"/></a>
                                                    <span
                                                        class="boxe-m-date">{{ $big->timeHandler() }}</span>
                                                </div>
                                                <div class="box-content-left">
                                                    <h3 class="post-title2">
                                                        <small class=" text-muted"><i class="fa fa-stop"
                                                                                      aria-hidden="true"></i>
                                                            {{ $big->head_title }}
                                                        </small>
                                                        <a href="{{ $big->path() }}">
                                                            {{ $big->title }}
                                                        </a>
                                                    </h3>

                                                    <div class="post-excerpt2">
                                                        <p>
                                                            {{ $big->description }}
                                                        </p>
                                                    </div>

                                                </div>
                                            </section>
                                        @endif
                                    @endforeach
                                </div>

                            @endif

                        @endif
                       <div class="separator"></div>

                        @if(isset($importants) && !empty($importants) && count($importants) > 0)
                            <section class="posts">
                                <div class="lead-posts">

                                    <div class="box-header"><b> :: @lang('site.choosen_news')</b><span><a
                                                href="{{ route('site.blog') }}">@lang('site.archive')</a></span></div>
                                    @foreach($importants as $important)
                                        <div class="col-md-4">
                                            <div class="lead-post-excerpt">
                                                <a class="lead-post-excerpt-thumb"
                                                   href="{{ $important->path() }}"><img
                                                        width="185" height="125"
                                                        src="{{  $important->picture() }}"
                                                        alt-="{{ $important->head_title }}"
                                                        title=" {{ $important->head_title }}"/></a>

                                                <span
                                                    class="boxe-1-left-date">{{ $important->timeHandler() }}</span>
                                                <h3 class="post-title2 post-title3">
                                                    @if(isset($important->head_title) && !empty($important->head_title))
                                                    <small class=" text-muted"><i class="fa fa-stop"
                                                                                  aria-hidden="true"></i>
                                                        {{ $important->head_title }}</small>
                                                    @endif

                                                    
                                                    <a
                                                        href="{{ $important->path() }}">
                                                        {{ $important->title }}
                                                    </a>
                                                </h3>
                                            </div>
                                            <!--/.lead-post-excerpt-->
                                        </div>
                                    @endforeach
                                </div>
                            </section>
                        @endif
                        
                        

                        <div class="separator"></div>

                        <section class="posts">
                            <div class="box-header">
                                <h1> {{ $tag->title }}</h1>
                            </div>

                        @foreach($latests as $new)
                           <div class="post-item-excerpt clearfix">
                                        <div class="post-thumbnail medium">
                                            <a href="{{ $new->path() }}"><img
                                                    width="135" height="95"
                                                    src="{{ $new->picture() }}"
                                                    alt="{{ $new->title }}"
                                                    title="{{ $new->title }}"/></a>
                                            <span class="boxe-1-left-date">{{ $new->timeHandler() }}</span>
                                        </div>
                                        <div class="post-excerpt">
                                            @if(isset($new->head_title) && !empty($new->head_title))
                                            <small class=" text-muted"><i class="fa fa-stop" aria-hidden="true"></i>
                                                {{ $new->head_title }}</small>
                                            @endif
                                            <h3 class="post-title2">
                                                <a href="{{ $new->path() }}">
                                                    {{ $new->title }}
                                                </a>
                                            </h3>
                                            <div class="post-excerpt-summary">
                                                <p>{{ \Illuminate\Support\Str::limit($new->description , 200) }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                        </section>

                    </div>
                  <div class="col-md-4 left">
                        <div id="sidebar-left">
                            <div class="sidebar-left">
                                <div class="scrollbar-inner" id="politics-scrollable">

                                    @if(isset($mviews) && !empty($mviews) && count($mviews) >0)
                                        <div class="sidebar-box">
                                            <div class="column-header"><span class="bullet"></span>
                                                <h3><b>@lang('site.most_viewd')</b></h3>
                                            </div>
                                            <div class="sidebar-box-content-left">
                                                <div class="post-wrap">
                                                    @foreach($mviews as $new)
                                                    @if(isset($new) && !empty($new) && $new->status == 1)
                                                    <div class="column-post-item clearfix">
                                                        <div class="column-post-thumb">
                                                            <a href="{{ $new->path() }}"><img
                                                                    width="100" height="70"
                                                                    src="{{ $new->picture() }}"
                                                                    alt="{{ $new->title }}"
                                                                    title="{{ $new->title }}"/></a>
                                                        </div>
                                                        <h3 class="post-title">
                                                            <small class=" text-muted">{{ $new->head_title }}</small> <br> <a
                                                                href="{{ $new->path() }}">
                                                            {{ $new->title }}
                                                            </a>
                                                        </h3>
                                                    </div>
                                                    @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                        @if(isset($mcomments) && !empty($mcomments) && count($mcomments) >0)
                                        <div class="sidebar-box">
                                        <div class="column-header"><span class="bullet"></span>
                                            <h3><b>@lang('site.most_commented')</b></h3>
                                        </div>
                                        <div class="sidebar-box-content-left">
                                            <div class="post-wrap">
                                                @foreach($mcomments as $comment)
                                                <div class="column-post-item clearfix">
                                                    @if(isset($comment) && !empty($comment) && $comment->status == 1)
                                                    <div class="column-post-thumb">
                                                        <a href="{{ $comment->path() }}"><img
                                                                width="100" height="70"
                                                                src="{{$comment->picture() }}"
                                                                alt="{{ $comment->title }}"
                                                                title="{{ $comment->title }}"/></a>
                                                    </div>
                                                    <h3 class="post-title">
                                                        <a href="{{ $comment->path() }}">
                                                            {{ $comment->title }}
                                                            </a>
                                                    </h3>
                                                    @endif
                                                </div>
                                                @endforeach


                                            </div>
                                        </div>
                                    </div>
                                        @endif

                                    <div class="all_ads"><a href="" target="_blank" rel="nofollow"><img
                                                src="{{ url('taj-theme') }}/assets/img/ads-1.png"></a></div>

                                    @if(isset($notes) && !empty($notes) && count($notes) > 0)
                                        <div class="box_author">
                                            <div class="box-header"><b><i class="fa fa-book" aria-hidden="true"></i>
                                                    @lang('site.notes')</b><span><a
                                                        href="{{ route('site.blog') }}">@lang('site.archive')</a></span>
                                            </div>
                                            @if(isset($notes[0]) && !empty($notes[0]) )
                                                <div class="box_author-top">
                                                    <a class="box_author-thumb"
                                                       href="{{ $notes[0]->path() }}"><img
                                                            width="293" height="200"
                                                            src="{{ $notes[0]->picture() }}"
                                                            alt="{{ $notes[0]->title }}"
                                                            title="{{ $notes[0]->title }}"/></a>
                                                    <div id="lin-10"></div>
                                                    <small class=" text-muted">@lang('site.author')
                                                        : @lang('site.author_name')</small> <br> <small
                                                        class=" text-author "><i
                                                            class="fa fa-stop" aria-hidden="true"></i>

                                                        {{ $notes[0]->head_title }}

                                                    </small><br>
                                                    <div id="lin-10"></div>
                                                    <div class="box_author-top-titl"><a
                                                            href="{{ $notes[0]->path() }}">
                                                            {{ $notes[0]->title }}
                                                        </a></div>
                                                    <br>
                                                    <p>
                                                        {{ $notes[0]->description }}
                                                    </p>
                                                </div>
                                            @endif

                                            @if(isset($notes) && !empty($notes) && count($notes) > 0)
                                                <div class="author-bottom">
                                                    @foreach($notes as $key => $bottom)
                                                        @if($key > 0)
                                                            <div class="author-box">
                                                                <div class="author-box-image">
                                                                    <a href="{{ $bottom->path() }}"><img
                                                                            width="50" height="50"
                                                                            src="{{ $bottom->picture() }}"
                                                                            alt="{{ $bottom->title }}"
                                                                            title="{{ $bottom->title }}"/></a>
                                                                </div>
                                                                <small class=" text-muted"><i class="fa fa-stop"
                                                                                              aria-hidden="true"></i>
                                                                    {{ $bottom->head_title }}</small> <br>
                                                                <div class="author-box-txt"><a
                                                                        href="{{ $bottom->path() }}">
                                                                        {{ $bottom->title }}
                                                                    </a></div>
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                </div>
                                            @endif
                                        </div>
                                    @endif


                                    @if(isset($specifics) && !empty($specifics) && count($specifics) > 0)

                                        <div class="sidebar-box">
                                            <div class="column-header"><span class="bullet"></span>
                                                <p><b>@lang('site.specifics')</b></p>
                                            </div>
                                            <div class="sidebar-axenan">
                                                <div class="list_post">
                                                    <ul>
                                                        @foreach($specifics as $special)
                                                            <li>
                                                                <div class="list_post_contin">
                                                                    <h2>
                                                                        <a href="{{ $special->path() }}">

                                                                            {{ $special->title }}
                                                                        </a>
                                                                    </h2>
                                                                    <time>{{ $special->timeHandler() }}</time>
                                                                </div>
                                                            </li>
                                                        @endforeach


                                                    </ul>

                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    <div class="all_ads"><a href="" target="_blank" rel="nofollow"><img
                                                src="{{ url('taj-theme') }}/assets/img/ads-1.png"></a></div>


                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/.col-md-4-->
                </div>
                <!--/.row-->
            </div>
            <!--/.col-md-10-->
         <!--<div class="col-md-2 ads">-->
         <!--       <section id="ads">-->
         <!--           <div class="all_ads"><a href="http://aftab.demo-qaleb.ir/" target="_blank" rel="nofollow"><img-->
         <!--                       src="{{ url('taj-theme') }}/assets/img/ads-2.png"></a></div>-->
         <!--           <div class="all_ads"><a href="" target="_blank" rel="nofollow"><img-->
         <!--                       src="{{ url('taj-theme') }}/assets/img/ads-2.png"></a></div>-->
         <!--           <div class="all_ads"><a href="" target="_blank" rel="nofollow"><img-->
         <!--                       src="{{ url('taj-theme') }}/assets/img/ads-2.png"></a></div>-->
         <!--       </section>-->
         <!--   </div>-->
        </div>
        <!--/.row#content-->
    </div>
    
    

@endsection
