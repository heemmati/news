@extends('site.layout.master')



@section('seos')


<title>
    {{ $tag->title }}
</title>
    <meta http-equiv="content-language" content="fa" />
    <meta name="dc.publisher" content="@lang('site.site_name')" />
    <meta name="dc.identifier" content="https://www.sahandpress.ir" />
    <meta name="copyright" content="©2021 Sahandpress Agency (www.sahandpress.ir)" />
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
