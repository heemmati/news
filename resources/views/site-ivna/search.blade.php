@extends('site.layout.master')

@section('seos')


    <title>{{ $search->title }}</title>
    <meta http-equiv="content-language" content="fa"/>
    <meta name="dc.publisher" content="@lang('site.seo_first_page')"/>
    <meta name="dc.identifier" content="https://www.ivnanews.ir"/>
    <meta name="copyright" content="©2021 ivnanews Agency (www.ivnanews.ir)"/>
    <meta itemprop="inLanguage" content="fa"/>
    <meta itemprop="name" content="{{ $search->title }}"/>




    <meta itemprop="description" content="@lang('site.seo_search_description')"/>



    <link rel="alternate" hreflang="fa" href="{{  route('site.search') }}"/>
    <link rel="canonical" href="{{  route('site.search') }}">

    <meta name="description" content="@lang('site.seo_search_description')"/>







@endsection

@section('content')

    <main class="main">
        @if(isset($news) && !empty($news))
            <div class="container">
                <div class="row">
                    <div class="box5">
                        <h3 class="title title-box">
                             <span>


                  {{ !empty($title) ? $title : 'آرشیو' }}

                         </span>
                        </h3>
                        <div class="search-box">


                            <div class="item-box1">

                                @foreach ($news as $base)
                                    <div class="item3 end1">
                                        <div class="item-image">
                                            <x-site.tools.image :image="$base->baseable"></x-site.tools.image>
                                        </div>
                                        <div class="description3">
                                            <div class="title">
                                                <h4>
                                                    <a href="{{ $base->baseable->path() }}">
                                                        {{  $base->baseable->title }}
                                                    </a>
                                                </h4>
                                            </div>
                                            <div class="desc">
                                                <p>
                                                    {{ $base->baseable->description }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                @endforeach



                            </div>

                        </div>


                    </div>
                </div>
            </div>

        @endif
    </main>

@endsection
