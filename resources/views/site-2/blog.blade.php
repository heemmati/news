@extends('site.layout.master')



@section('seos')


    <meta http-equiv="content-language" content="fa" />
    <meta name="dc.publisher" content="@lang('site.seo_archive_page')" />
    <meta name="dc.identifier" content="https://www.techli.ir" />
    <meta name="copyright" content="©2021 techli Agency (www.techli.ir)" />
    <meta itemprop="inLanguage" content="fa" />
    <meta itemprop="name" content="@lang('site.seo_archive_page')" />
    
    
    

    <meta itemprop="description" content="@lang('site.seo_archive_description')" />

    

    <link rel="alternate" hreflang="fa" href="{{ url('/archive') }}"/>
    <link rel="canonical" href="{{ url('/archive') }}" >
    

    <meta property="og:title" itemprop="headline" content="@lang('site.seo_archive_page')" />
    
    <meta property="og:type" content="article" />
    <meta property="og:url" content="{{ url('/archive') }}" />
    <meta property="og:description" itemprop="description" content="@lang('site.seo_archive_description')" />
    <meta property="og:site_name" content="@lang('site.seo_archive_page')" />
    <meta property="og:locale" content="fa_IR" />

    <meta name="twitter:card" content="article" />
    <meta name="twitter:title" content="@lang('site.seo_archive_page')" />
    <meta name="twitter:description" content="@lang('site.seo_archive_description')"/>
  
    <meta name="description" content="@lang('site.seo_archive_description')" />
    <meta name="dc.identifier"
          content="{{ url('/archive') }}" />

@endsection


@section('content')

    <main class="main">
        @if(isset($news) && !empty($news))
            <div class="container">
                <div class="row">
                    <div class="box5">
                        <h1 class="title title-box">
                             <span>


                @lang('site.seo_archive_page')

                         </span>
                        </h1>
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

                        </div>
                        {!! $news->render() !!}

                    </div>
                </div>
            </div>

        @endif
    </main>

@endsection
