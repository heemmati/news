@extends('site.layout.master')



@section('seos')

    <title>@lang('site.seo_first_page')</title>

    <meta name="description" content="@lang('site.seo_first_description')" />

    <link rel="alternate" hreflang="fa" href="https://www.ivnanews.ir" />

    <meta http-equiv="content-language" content="fa" />

    <meta name="keywords" content="@lang('site.seo_first_keywords')" />

    <meta name="dc.publisher" content="@lang('site.seo_first_page')" />
    <meta name="dc.identifier" content="https://www.ivnanews.ir" />
    <meta name="copyright" content="©2021 Ivna News Agency (www.ivnanews.ir)" />
    <!--<meta name="dcterms.created" content="2002-10-14T15:24:23+00:00" />-->
    <!--<meta name="dcterms.modified" content="2021-08-11 T 09:22:56 +0430" />-->
    <meta itemprop="name" content="@lang('site.seo_first_page')" />
    <meta itemprop="description" content="@lang('site.seo_first_description')" />
    <meta itemprop="image" content="https://www.ivnanews.ir/storage//photos/1/ivna-..-site.png" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="@lang('site.seo_first_page')" />
    <meta name="twitter:description" content="" />
    <meta name="twitter:site" content="@IvnaNews_Agency" />
    <meta name="twitter:image:src" content="https://www.ivnanews.ir/storage//photos/1/ivna-..-site.png" />
    <meta name="twitter:image" content="https://www.ivnanews.ir/storage//photos/1/ivna-..-site.png" />
    <meta name="twitter:image:alt" content="@lang('site.seo_first_page')" />
    <meta name="twitter:domain" content="https://www.ivnanews.ir" />
    <meta property="og:title" content="@lang('site.seo_first_page')" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://www.ivnanews.ir" />
    <meta property="og:image" content="https://www.ivnanews.ir/storage//photos/1/ivna-..-site.png" />
    <meta property="og:description" content="@lang('site.seo_first_description')" />
    <meta property="og:site_name" content="@lang('site.seo_site_name')" />
    <meta property="article:published_time" content="2021-08-11 T 09:22:56 +0430" />
    <meta name="date" content="2021-08-11 T 09:22:56 +0430" />
    <meta property="og:locale" content="fa_IR" />
    <meta property="og:article:author" content="@lang('site.seo_first_page')" />
    <meta property="og:article:section" content="صفحه نخست" />
    <meta name="generator" content="https://www.ivnanews.ir" />
    <meta name="language" content="fa" />
    <meta name="rating" content="General" />
    <meta name="expires" content="never" />
    <meta name="robots" content="INDEX,FOLLOW" />
    <meta name="publisher" content="@lang('site.seo_first_page')" />
    <link rel="canonical" href="https://www.ivnanews.ir/" />



@endsection



@section('stylus')
    <link href="{{ url('ivna-theme') }}/assets/sass/index.css" rel="stylesheet" type="text/css">

@endsection

@section('content')




    <div class="container">
        <div class="breadcrumbs">
            <ul class="breadcrumb">
                <li>
                    <svg xmlns="http://www.w3.org/2000/svg" id="newspaper-news-svgrepo-com" width="19.733"
                         height="19.733" viewBox="0 0 19.733 19.733">
                        <g id="Group_2810" data-name="Group 2810">
                            <g id="Group_2809" data-name="Group 2809">
                                <path id="Path_1565" data-name="Path 1565"
                                      d="M18.911,9.044H16.445V1.363A1.308,1.308,0,0,0,15.081,0H1.449A1.449,1.449,0,0,0,0,1.449V18.285a1.449,1.449,0,0,0,1.449,1.449H17.267a2.466,2.466,0,0,0,2.467-2.467v-7.4A.822.822,0,0,0,18.911,9.044ZM1.644,1.644H14.8V17.267c0,.037,0,.074,0,.11a2.458,2.458,0,0,0,.138.712H1.644ZM18.089,17.267a.822.822,0,0,1-.822.822l-.055,0a.907.907,0,0,1-.765-.765c0-.018,0-.036,0-.055V10.689h1.644v6.578Z"
                                      fill="#fff"/>
                                <path id="Path_1566" data-name="Path 1566"
                                      d="M64.822,321.645h4.933a.822.822,0,0,0,0-1.644H64.822a.822.822,0,0,0,0,1.644Z"
                                      transform="translate(-61.533 -307.668)" fill="#fff"/>
                                <path id="Path_1567" data-name="Path 1567"
                                      d="M279.8,320h-1.644a.822.822,0,1,0,0,1.644H279.8a.822.822,0,1,0,0-1.644Z"
                                      transform="translate(-266.644 -307.667)" fill="#fff"/>
                                <path id="Path_1568" data-name="Path 1568"
                                      d="M66.467,384H64.822a.822.822,0,0,0,0,1.644h1.644a.822.822,0,0,0,0-1.644Z"
                                      transform="translate(-61.533 -369.2)" fill="#fff"/>
                                <path id="Path_1569" data-name="Path 1569"
                                      d="M197.756,384h-4.933a.822.822,0,1,0,0,1.644h4.933a.822.822,0,1,0,0-1.644Z"
                                      transform="translate(-184.6 -369.2)" fill="#fff"/>
                                <path id="Path_1570" data-name="Path 1570"
                                      d="M110.777,72.222a4.111,4.111,0,1,0-4.111-4.111A4.111,4.111,0,0,0,110.777,72.222Zm0-6.578a2.467,2.467,0,1,1-2.467,2.467A2.467,2.467,0,0,1,110.777,65.644Z"
                                      transform="translate(-102.555 -61.533)" fill="#fff"/>
                            </g>
                        </g>
                    </svg>
                    <a href="">اخبار ویژه</a>
                </li>
                @if(isset($uppers) && !empty($uppers))
                    @foreach($uppers as $upper)
                        <li>
                            <a href="{{ $upper->path() }}">
                                {{ $upper->title }}
                            </a>
                        </li>
                    @endforeach
                @endif
            </ul>
        </div>
    </div>
    <div class="news">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="main-news">
                        <div class="main-title">
                            <h1>
                                خبر های اصلی
                            </h1>
                            <hr>
                        </div>
                        @if(isset($bignews) && !empty($bignews) && count($bignews) > 0 )
                            <div class="main-slider">
                                <div class="owl-carousel owl-theme  owl-carousel-service slider1">
                                    @foreach($bignews as $new)
                                        <div class="item">
                                            <div class="news-image">
                                                <a href="{{ $new->path() }}">
                                                    <img
                                                        src="{{ Storage::url($new->image) }}"
                                                        height="335"
                                                        width="578"/>
                                                </a>
                                            </div>

                                            <div class="news-titr">
                                                <a href="{{ $new->path() }}">
                                                    {{ $new->title }}
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif



                        @if(isset($bignews) && !empty($bignews) && count($bignews) > 0)
                            <div class="title">
                                <h2>
                                    <a href="{{ $bignews[0]->path() }}">
                                        {{ $bignews[0]->title }}
                                    </a>
                                </h2>
                            </div>
                            <div class="description">
                                <p>

                                    {{ $bignews[0]->description }}

                                </p>
                            </div>
                        @endif

                    </div>
                    <div class="special-news">
                        <div class="title">
                            <h2>
                                اخبار ویژه
                            </h2>
                            <hr>
                        </div>
                        @foreach($specifics as $key => $specific)
                            <div class="special-box">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="special-image">
                                            <a href="{{ $specific->path() }}">
                                                <img src="{{ Storage::url($specific->image) }}"
                                                     alt="{{ $specific->title }}" height="119" width="196"/>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="special-caption">
                                            <div class="writer">
                                                @if(isset($specific->head_title) && !empty($specific->head_title))
                                                    <p>
                                                        {{ $specific->head_title }}
                                                    </p>
                                                @endif
                                            </div>
                                            <div class="title">
                                                <h2>
                                                    <a href="{{ $specific->path() }}">
                                                        {{ $specific->title }}
                                                    </a>

                                                </h2>
                                            </div>
                                            <div class="description">
                                                <p>
                                                    {{ Str::limit($specific->description , 150) }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
                <div class="col-md-3">
                    @if(isset($importants) && !empty($importants))
                        <div class="top-news">
                            <div class="top-title">
                                <h2>
                                    خبر های اصلی
                                </h2>
                                <hr>
                            </div>
                            <div class="top-news-box">
                                <ul>
                                    @foreach($importants as $important)
                                        <li>
                                            <i class="fa fa-circle"></i>
                                            <a href="{{ $important->path() }}">
                                                {{ $important->title }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif
                    <div class="tab-news">
                        <div class="tab">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                            data-bs-target="#home" type="button" role="tab" aria-controls="home"
                                            aria-selected="true">
                                        آخرین اخبار
                                        <div class="border">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="103.2" height="5.722"
                                                 viewBox="0 0 103.2 5.722">
                                                <path id="Path_1556" data-name="Path 1556"
                                                      d="M89,0H42.237L38.425,4.475,34.175,0H-14.2"
                                                      transform="translate(14.2 0.5)" fill="none" stroke="#ec202d"
                                                      stroke-width="1"/>
                                            </svg>
                                        </div>
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab"
                                            data-bs-target="#profile" type="button" role="tab" aria-controls="profile"
                                            aria-selected="false">

                                        پربازدیدترین اخبار
                                        <div class="border">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="103.2" height="5.722"
                                                 viewBox="0 0 103.2 5.722">
                                                <path id="Path_1556" data-name="Path 1556"
                                                      d="M89,0H42.237L38.425,4.475,34.175,0H-14.2"
                                                      transform="translate(14.2 0.5)" fill="none" stroke="#ec202d"
                                                      stroke-width="1"/>
                                            </svg>
                                        </div>
                                    </button>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade review active show" id="home" role="tabpanel"
                                     aria-labelledby="home-tab">
                                    <div class="accordion-body">
                                        @if(isset($latests) && !empty($latests))
                                            <div class="last-news">
                                                <div class="row">
                                                    @foreach($latests as $key => $new)
                                                        <div class="col-md-6">
                                                            <div class="last-news-box">
                                                                <div class="last-news-image">
                                                                    <a href="{{ $new->path() }}">
                                                                        <img
                                                                            src="{{ Storage::url($new->image) }}"
                                                                            height="119" width="196"/>
                                                                    </a>
                                                                </div>
                                                                <div class="last-news-title">
                                                                    <h2>
                                                                        <a href="{{ $new->path() }}">
                                                                            {{ $new->title }}
                                                                        </a>
                                                                    </h2>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                                <div class="see-all">
                                                    <a href="{{ route('site.blog')  }}">
                                                        مشاهده همه خبر ها
                                                    </a>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="tab-pane fade accent" id="profile" role="tabpanel"
                                     aria-labelledby="profile-tab">
                                    <div class="accordion-body">
                                        @if(isset($mviews) && !empty($mviews))
                                            <div class="most-visited-news">
                                                <div class="row">
                                                    @foreach($mviews as $mv)
                                                        <div class="col-md-6">
                                                            <div class="most-visited-box">
                                                                <div class="most-visited-image">
                                                                    <a href="{{ $mv->article->path() }}">
                                                                        <img
                                                                            src="{{ Storage::url($mv->article->image) }}"
                                                                            alt="{{ $mv->article->title }}"
                                                                            height="119" width="196"/>
                                                                    </a>
                                                                </div>
                                                                <div class="most-visited-title">
                                                                    <h2>
                                                                        <a href="{{ $mv->article->path() }}">
                                                                            {{ $mv->article->title }}
                                                                        </a>
                                                                    </h2>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                                <div class="see-all">
                                                    <a href="{{ route('site.blog') }}">
                                                        مشاهده همه خبر ها
                                                    </a>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                    @if(isset($journals) && !empty($journals) && count($journals) > 0)
                        <div class="newspaper">
                            <div class="title">
                                <h2>
                                    گیشه روزنامه
                                </h2>
                            </div>
                            <div class="newspaper-slider">
                                <div class="owl-carousel owl-theme  owl-carousel-service slider4">
                                    @foreach($journals as $jor)
                                        @if(isset($jor->images) && !empty($jor->images) && count($jor->images) > 0)
                                            <div class="item">
                                                <div class="news-image">
                                                    <a href="{{ $jor->path() }}">
                                                        <img
                                                            src="{{ Storage::url($jor->images[0]->src) }}"
                                                            alt="{{ $jor->title }}"
                                                            height="174" width="254"/>
                                                    </a>
                                                </div>
                                            </div>
                                        @endif

                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="ivna-graphy">
                        <div class="title">
                            <h2>
                                ایونا گرافی
                            </h2>
                        </div>
                        <div class="ivna-graphy-slider">
                            <div class="owl-carousel owl-theme  owl-carousel-service slider5">
                                <div class="item">
                                    <div class="news-image">
                                        <a href="">
                                            <img
                                                src="{{  url('ivna-theme') }}/images/main-page-images/Mask Group 15.png"
                                                height="174" width="254"/>
                                        </a>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="news-image">
                                        <a href="">
                                            <img
                                                src="{{  url('ivna-theme') }}/images/main-page-images/Mask Group 15.png"
                                                height="174" width="254"/>
                                        </a>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="news-image">
                                        <a href="">
                                            <img
                                                src="{{  url('ivna-theme') }}/images/main-page-images/Mask Group 15.png"
                                                height="174" width="254"/>
                                        </a>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="news-image">
                                        <a href="">
                                            <img
                                                src="{{  url('ivna-theme') }}/images/main-page-images/Mask Group 15.png"
                                                height="174" width="254"/>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    @if(isset($leader_message) && !empty($leader_message) )
                        <div class="manager">
                            <div class="manager-note">
                                <div class="manager-title">
                                    <h2>
                                        یادداشت مدیر مسئول
                                    </h2>
                                    <hr>
                                    <hr>
                                </div>
                                <div class="manager-image">
                                    <a href="{{ $leader_message->path() }}">
                                        @if(isset($leader_message->image) && !empty($leader_message->image) )
                                            <img src="{{ Storage::url($leader_message->image) }}"
                                                 height="378" width="254"/>
                                        @endif
                                    </a>
                                </div>
                                <div class="manager-caption">
                                    <div class="note-title">
                                        <h2>
                                            <a href="{{ $leader_message->path() }}">
                                                دکتر مهدی کریمی تفرشی
                                            </a>
                                        </h2>
                                    </div>
                                    <div class="note-desc">
                                        <p>
                                            {{ Str::limit($leader_message->description , 150) }}
                                        </p>
                                    </div>
                                    <div class="note-titr">
                                        <a href="{{ $leader_message->path() }}">
                                            {{ $leader_message->title }}
                                        </a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    @endif


                    <div class="social-icons">
                        <div class="facebook">
                            <a href="{{ $socials['facebook']->print }}">
                                <i class="fa fa-facebook"></i>
                            </a>
                            <p>فیس بوک</p>
                        </div>
                        <div class="twitter">
                            <a href="{{ $socials['twitter']->print }}">
                                <i class=" fa fa-twitter"></i>
                            </a>
                            <p>توییتر</p>
                        </div>
                        <div class="instagram">
                            <a href="{{ $socials['instagram']->print }}">
                                <i class="fa fa-instagram"></i>
                            </a>

                            <p>اینستاگرام</p>
                        </div>
                        <div class="telegram">
                            <a href="{{ $socials['telegram']->print }}">
                                <i class="fa fa-telegram"></i>
                            </a>
                            <p>تلگرام</p>
                        </div>
                        <div class="aparat">
                            <a href="{{ $socials['aparat']->print }}">
                                <svg id="Group_2708" data-name="Group 2708" xmlns="http://www.w3.org/2000/svg"
                                     width="15.78" height="15.8" viewBox="0 0 15.78 15.8">
                                    <g id="Group_2706" data-name="Group 2706" transform="translate(0 0)">
                                        <g id="Group_6222" data-name="Group 6222" transform="translate(0 0)">
                                            <g id="logo_aparat" data-name="logo aparat" transform="translate(0 0)">
                                                <path id="Path_1" data-name="Path 1"
                                                      d="M11.581.454,10.17.074A2.157,2.157,0,0,0,7.53,1.6L7.15,3.008A6.927,6.927,0,0,1,11.577.454"
                                                      transform="translate(-5.299 0)" fill="#fff"/>
                                                <path id="Path_2" data-name="Path 2"
                                                      d="M47.031,11.69l.38-1.411a2.157,2.157,0,0,0-1.542-2.627l-1.411-.38A6.927,6.927,0,0,1,47.013,11.7"
                                                      transform="translate(-31.7 -5.389)" fill="#fff"/>
                                                <path id="Path_3" data-name="Path 3"
                                                      d="M.453,31.935l-.38,1.411A2.157,2.157,0,0,0,1.6,35.986l1.411.38A6.927,6.927,0,0,1,.453,31.939"
                                                      transform="translate(0 -22.417)" fill="#fff"/>
                                                <path id="Path_4" data-name="Path 4"
                                                      d="M31.865,47.136l1.411.38a2.157,2.157,0,0,0,2.64-1.524l.38-1.411a6.928,6.928,0,0,1-4.427,2.555"
                                                      transform="translate(-22.367 -31.789)" fill="#fff"/>
                                                <path id="Path_5" data-name="Path 5"
                                                      d="M12.365,3.929a6.955,6.955,0,1,0,4.917,8.519v0a6.956,6.956,0,0,0-4.918-8.516M9.325,5.772A1.913,1.913,0,1,1,6.984,7.128v0a1.912,1.912,0,0,1,2.34-1.351M7.06,14.218A1.913,1.913,0,1,1,9.4,12.863v0a1.913,1.913,0,0,1-2.34,1.351m2.7-3.812a.85.85,0,1,1,.6,1.039h0a.85.85,0,0,1-.6-1.039m2.052,5.1a1.913,1.913,0,1,1,2.341-1.355v0a1.912,1.912,0,0,1-2.34,1.351m1.277-4.77a1.913,1.913,0,1,1,2.341-1.355v0a1.912,1.912,0,0,1-2.34,1.351"
                                                      transform="translate(-2.674 -2.735)" fill="#fff"/>
                                            </g>
                                        </g>
                                    </g>
                                </svg>
                            </a>

                            <p>آپارات</p>
                        </div>
                    </div>
                    <div class="advertising">
                        <div class="title">
                            <h2>
                                تبلیغات
                            </h2>
                            <hr>
                        </div>
                        <div class="advertising-box">
                            <a href="">
                                <img src="{{  url('ivna-theme') }}/images/main-page-images/frgrt.png" height="98"
                                     width="294"/>
                            </a>
                        </div>
                        <div class="advertising-box">
                            <a href="">
                                <img src="{{  url('ivna-theme') }}/images/main-page-images/Mask Group 4.png" height="98"
                                     width="294"/>
                            </a>
                        </div>
                        <div class="advertising-box">
                            <a href="">
                                <img src="{{  url('ivna-theme') }}/images/main-page-images/Mask Group 5.png" height="98"
                                     width="294"/>
                            </a>
                        </div>
                        <div class="advertising-box">
                            <a href="">
                                <img src="{{  url('ivna-theme') }}/images/main-page-images/Group 1726.png" height="98"
                                     width="294"/>
                            </a>
                        </div>
                        <div class="advertising-box">
                            <a href="">
                                <img src="{{  url('ivna-theme') }}/images/main-page-images/Group 1727.png" height="98"
                                     width="294"/>
                            </a>
                        </div>
                        <div class="advertising-box">
                            <a href="">
                                <img src="{{  url('ivna-theme') }}/images/main-page-images/Mask Group 3.png" height="98"
                                     width="294"/>
                            </a>
                        </div>
                        <div class="advertising-box">
                            <a href="">
                                <img src="{{  url('ivna-theme') }}/images/main-page-images/Mask Group 4.png" height="98"
                                     width="294"/>
                            </a>
                        </div>
                        <div class="advertising-box">
                            <a href="">
                                <img src="{{  url('ivna-theme') }}/images/main-page-images/Mask Group 5.png" height="98"
                                     width="294"/>
                            </a>
                        </div>
                        <div class="advertising-box">
                            <a href="">
                                <img src="{{  url('ivna-theme') }}/images/main-page-images/Group 1726.png" height="98"
                                     width="294"/>
                            </a>
                        </div>
                        <div class="advertising-box">
                            <a href="">
                                <img src="{{  url('ivna-theme') }}/images/main-page-images/Group 1727.png" height="98"
                                     width="294"/>
                            </a>
                        </div>
                        <div class="advertising-box">
                            <a href="">
                                <img src="{{  url('ivna-theme') }}/images/main-page-images/Mask Group 5.png" height="98"
                                     width="294"/>
                            </a>
                        </div>
                        <div class="advertising-box">
                            <a href="">
                                <img src="{{  url('ivna-theme') }}/images/main-page-images/Group 1726.png" height="98"
                                     width="294"/>
                            </a>
                        </div>
                        <div class="advertising-box-big">
                            <a href="">
                                <img src="{{  url('ivna-theme') }}/images/main-page-images/5.png" height="292"
                                     width="294"/>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        @if(isset($kitchens) && !empty($kitchens) && count($kitchens) > 0)
            <div class="image-gallery-top">
                <div class="container">
                    <div class="title">
                        <h2>
                           آشپزخانه گلها
                        </h2>
                        <hr>
                    </div>
                    <div class="row">

                        <div class="col-md-6">
                            @if(isset($kitchens[0]) && !empty($kitchens[0]))
                                <div class="big-box">
                                    <div class="big-box-image">
                                        <a href="{{ $kitchens[0]->path()  }}">
                                            <img src="{{ Storage::url($kitchens[0]->image) }}"
                                                 alt="{{ $kitchens[0]->title }}"
                                                 height="217" width="294"/>
                                        </a>
                                    </div>
                                    <div class="gallery-caption">
                                        <div class="box-title">
                                            <h2>

                                                <a href="{{ $kitchens[0]->path()  }}">
                                                    {{ $kitchens[0]->title }}
                                                </a>
                                            </h2>
                                        </div>
                                        <div class="box-desc">
                                            <p>
                                                {{ Str::limit($kitchens[0]->description , 150) }}
                                            </p>
                                        </div>
                                        <div class="box-titr">
                                            <a href="{{ $kitchens[0]->path()  }}">
                                                ادامه مطلب
                                            </a>
                                            <i class="fas fa-arrow-left"></i>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                @if(count($kitchens) > 1)
                                    @foreach($kitchens as $key => $kitchen)
                                        @if($key > 0)
                                            <div class="col-md-6">
                                                <div class="small-box">
                                                    <div class="small-box-image">
                                                        <a href="{{ $kitchen->title  }}">

                                                            <img
                                                                src="{{ $kitchen->picture() }}"
                                                                alt="{{ $kitchen->title }}"
                                                                height="217" width="294"/>
                                                        </a>
                                                    </div>
                                                    <div class="gallery-caption">
                                                        <div class="box-title">
                                                            <h2>
                                                                <a href="{{ $kitchen->path() }}">
                                                                    {{ $kitchen->title }}                                                    </a>
                                                            </h2>
                                                        </div>
                                                        <div class="box-desc">
                                                            <p>

                                                                {{ Str::limit($kitchen->description , 150) }}
                                                            </p>
                                                        </div>
                                                        <div class="box-titr">
                                                            <a href="{{ $kitchen->path() }}">
                                                                ادامه مطلب
                                                            </a>
                                                            <i class="fas fa-arrow-left"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        @if(isset($sidenews) && !empty($sidenews) && count($sidenews) > 0)
            <div class="news-side">
                <div class="container">
                    <div class="title">
                        <h2>
                            اخبار در حاشیه
                        </h2>
                        <hr>
                    </div>
                </div>
                <div class="owl-carousel owl-theme  owl-carousel-service slider2">
                    @foreach($sidenews as $side)
                        <div class="item">
                            <div class="news-image">
                                <a href="{{ $side->path() }}">
                                    <img src="{{ $side->picture() }}"
                                         alt="{{ $side->title }}"
                                         height="296"
                                         width="402"/></a>
                            </div>
                            <div class="side-title">
                                <i class="fa fa-circle-o"></i>
                                <h2>
                                    <a href="{{ $side->path() }}">
                                        {{ $side->title }}
                                    </a>
                                </h2>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        @if(isset($fimages) && !empty($fimages) && count($fimages) > 0)
            <div class="image-gallery-bottom">
                <div class="container">
                    <div class="title">
                        <h2>
                            گالری تصاویر
                        </h2>
                        <hr>
                    </div>
                </div>
                <div class="owl-carousel owl-theme  owl-carousel-service slider3">
                    @foreach($fimages as $fimg)
                        <div class="item">
                            <div class="news-image">
                                <a href="{{ $fimg->path() }}">
                                    <img src="{{ $fimg->picture() }}"
                                         alt="{{ $fimg->title }}"
                                         height="296"
                                         width="402"/></a>
                            </div>
                            <div class="gallery-title">
                                <i class="fa fa-circle-o"></i>
                                <h2>
                                    <a href="{{ $fimg->path() }}">
                                        {{ $fimg->title }}
                                    </a>
                                </h2>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif


        @if(isset($fvideos) && !empty($fvideos) && count($fvideos) > 0 )
            <div class="film">
                <div class="container">
                    <div class="title">
                        <h2>
                            فیلم
                        </h2>
                        <hr>
                    </div>
                    <div class="row">
                        @if(isset($fvideos[0]) && !empty($fvideos[0]))
                            <div class="col-md-6">
                                <div class="big-film-box">
                                    <div class="big-box-image">
                                        <a href="">
                                            <img
                                                src="{{  url('ivna-theme') }}/images/main-page-images/Mask Group 622.png"
                                                height="464" width="617"/>
                                        </a>
                                    </div>
                                    <div class="box-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" id="play-button-svgrepo-com"
                                             width="27.473"
                                             height="30.658" viewBox="0 0 27.473 30.658">
                                            <g id="Group_2847" data-name="Group 2847" transform="translate(0 0)">
                                                <path id="Path_1618" data-name="Path 1618"
                                                      d="M64.462,42.209a3.477,3.477,0,0,1,0,6.022L43.944,60.078a3.479,3.479,0,0,1-5.217-3.013V33.375a3.479,3.479,0,0,1,5.217-3.013ZM62.877,45.22a.135.135,0,0,0-.076-.133L42.283,33.24a.159.159,0,0,0-.076-.023.163.163,0,0,0-.078.023.139.139,0,0,0-.078.135V57.066a.138.138,0,0,0,.078.135.144.144,0,0,0,.155,0L62.8,45.353A.135.135,0,0,0,62.877,45.22Z"
                                                      transform="translate(-38.727 -29.891)" fill="#ec202d"/>
                                            </g>
                                            <path id="Path_1619" data-name="Path 1619"
                                                  d="M65.463,47.752a.154.154,0,0,1,0,.266L44.945,59.865a.144.144,0,0,1-.155,0,.139.139,0,0,1-.078-.135V36.039a.138.138,0,0,1,.078-.135.164.164,0,0,1,.078-.023.159.159,0,0,1,.076.023Z"
                                                  transform="translate(-41.389 -32.555)" fill="#fff"/>
                                        </svg>
                                    </div>
                                    <div class="film-details">
                                        <div class="film-title">
                                            <h2>
                                                <a href="{{ $fvideos[0]->path() }}">
                                                    {{$fvideos[0]->title}}
                                                </a>
                                            </h2>
                                        </div>
                                        <div class="film-items">
                                    <span class="date">
                                        {{ $fvideos[0]->timeHandler() }}
                                    </span>
                                            <span class="visit-number">
                                        145656
                                    </span>
                                            <span class="visit-text">
                                        بازدید
                                    </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if(count($fvideos) > 1)
                            <div class="col-md-6">
                                <div class="row">
                                    @foreach($fvideos as $key => $fv)
                                        @if($key > 0)
                                            <div class="col-md-6">
                                                <div class="small-film-box">
                                                    <div class="small-box-image">
                                                        <a href="{{ $fv->path() }}">
                                                            <img
                                                                src="{{ $fv->picture() }}"
                                                                alt="{{ $fv->title }}"
                                                                height="217" width="294"/></a>
                                                    </div>
                                                    <div class="box-icon">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="18.783"
                                                             height="20.96"
                                                             viewBox="0 0 18.783 20.96">
                                                            <g id="play-button-svgrepo-com" transform="translate(0 0)">
                                                                <g id="Group_2847" data-name="Group 2847"
                                                                   transform="translate(0 0)">
                                                                    <path id="Path_1618" data-name="Path 1618"
                                                                          d="M56.321,38.313a2.377,2.377,0,0,1,0,4.117l-14.027,8.1a2.378,2.378,0,0,1-3.567-2.06v-16.2a2.378,2.378,0,0,1,3.567-2.06Zm-1.084,2.058a.092.092,0,0,0-.052-.091l-14.027-8.1a.109.109,0,0,0-.052-.016.111.111,0,0,0-.053.016.1.1,0,0,0-.053.092v16.2a.1.1,0,0,0,.053.092.1.1,0,0,0,.106,0l14.027-8.1A.092.092,0,0,0,55.238,40.371Z"
                                                                          transform="translate(-38.727 -29.891)"
                                                                          fill="#fff"/>
                                                                </g>
                                                                <path id="Path_1619" data-name="Path 1619"
                                                                      d="M44.871,52.278a.1.1,0,0,1-.106,0,.1.1,0,0,1-.053-.092v-16.2a.1.1,0,0,1,.053-.092.112.112,0,0,1,.053-.016.109.109,0,0,1,.052.016Z"
                                                                      transform="translate(-42.44 -33.607)"
                                                                      fill="#fff"/>
                                                            </g>
                                                        </svg>
                                                    </div>
                                                    <div class="film-details">
                                                        <div class="film-title">
                                                            <h2>
                                                                <a href="{{ $fv->path() }}">
                                                                    {{ $fv->title }}
                                                                </a>
                                                            </h2>
                                                        </div>
                                                        <div class="film-items">
                                    <span class="date">
                                       {{ $fv->timeHandler() }}
                                    </span>
                                                            <span class="visit-number">
                                        41
                                    </span>
                                                            <span class="visit-text">
                                        بازدید
                                    </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        @endif
        @if(isset($tags) && !empty($tags) && count($tags) > 0)
            <div class="tags">
                <div class="container">
                    <div class="title">
                        <h2>
                            برچسب ها
                        </h2>
                    </div>

                        <div class="tag-items">
                            <div class="row">
                                @foreach($tags as $tag)
                                <div class="col-md-1 col-4">
                                    <div class="tag-box">
                                        <a href="{{ $tag->path() }}">
                                            {{ $tag->title }}
                                        </a>
                                        <i class="fa fa-circle"></i>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>

                </div>
            </div>
        @endif
    </div>





@endsection
