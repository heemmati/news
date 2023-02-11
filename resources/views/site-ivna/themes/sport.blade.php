@extends('site.layout.master')

@section('stylus')

    <link rel="stylesheet" href="{{ url('ivna-theme') }}/assets/sass/sport-service.css">
@endsection

@section('seos')


    <title>
        {{ $category->title }}
    </title>
    <meta http-equiv="content-language" content="fa"/>
    <meta name="dc.publisher" content="@lang('site.site_name')"/>
    <meta name="dc.identifier" content="https://www.sahandpress.ir"/>
    <meta name="copyright" content="©2021 Sahandpress Agency (www.sahandpress.ir)"/>
    <meta itemprop="inLanguage" content="fa"/>
    <meta itemprop="name" content="@lang('site.site_name')"/>




    <meta itemprop="description" content="{{ $category->description }}"/>



    <link rel="alternate" hreflang="fa" href="{{ $category->path() }}"/>
    <link rel="canonical" href="{{ $category->path() }}">


    <meta property="og:title" itemprop="headline" content="{{ $category->title }}"/>

    <meta property="og:type" content="article"/>
    <meta property="og:url" content="{{ $category->path() }}"/>
    <meta property="og:description" itemprop="description" content="{{ $category->description }}"/>
    <meta property="og:site_name" content="@lang('site.site_name')"/>
    <meta property="og:locale" content="fa_IR"/>

    <!--<meta name="twitter:card" content="article" />-->
    <meta name="twitter:title" content="{{ $category->title }}"/>
    <meta name="twitter:description" content="{{ $category->description }}"/>

    <meta name="description" content="{{ $category->description }}"/>
    <meta name="dc.identifier"
          content="{{ $category->path() }}"/>

@endsection




@section('content')

    <body>
    <div class="sport-service">
        <div class="new-container">
            <div class="row">
                <div class="col-md-9">

                    @if(isset($bignews) && !empty($bignews) && count($bignews) > 0)
                    <div class="slider-service">
                        <div class="owl-carousel owl-theme  owl-carousel-service slider1">
                            @foreach($bignews as $big)
                            <div class="item">
                                <div class="news-image">
                                    <a href="{{ $big->path() }}">
                                        <img src="{{ \Illuminate\Support\Facades\Storage::url($big->image) }}"
                                             alt="{{ $big->title }}"
                                             height="417" width="626"/>
                                    </a>
                                </div>

                                <div class="news-title">
                                    <i class="fa fa-circle"></i>
                                    <h2>
                                        <a href="{{ $big->path() }}">
                                            {{ $big->title }}                                        </a>
                                    </h2>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif

                    <div class="last-sport-news">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="sport-box">
                                    <div class="news-image">
                                        <a href="">
                                            <img src="{{ url('ivna-theme') }}/assets/images/gt.jpg" height="135" width="180"/>
                                        </a>
                                    </div>
                                    <div class="title">
                                        <h2><a href="">انواع جدید واکسن کرونا</a></h2>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="sport-box">
                                    <div class="news-image">
                                        <a href="">
                                            <img src="{{ url('ivna-theme') }}/assets/images/1234.PNG" height="225" width="306"/>
                                        </a>
                                    </div>
                                    <div class="title">
                                        <h2><a href="">انواع جدید واکسن کرونا</a></h2>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="sport-box">
                                    <div class="news-image">
                                        <a href="">
                                            <img src="{{ url('ivna-theme') }}/assets/images/n4.jpg" height="417" width="626"/>
                                        </a>
                                    </div>
                                    <div class="title">
                                        <h2><a href="">انواع جدید واکسن کرونا</a></h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="sport-box">
                                    <div class="news-image">
                                        <a href=""><img src="{{ url('ivna-theme') }}/assets/images/15.jpg" height="196" width="300"/></a>
                                    </div>
                                    <div class="title">
                                        <h2><a href="">انواع جدید واکسن کرونا</a></h2>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="sport-box">
                                    <div class="news-image">
                                        <a href="">
                                            <img src="{{ url('ivna-theme') }}/assets/images/n3.jpg" height="417" width="626"/>
                                        </a>
                                    </div>
                                    <div class="title">
                                        <h2><a href="">انواع جدید واکسن کرونا</a></h2>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="sport-box">
                                    <div class="news-image">
                                        <a href="">

                                            <img src="{{ url('ivna-theme') }}/assets/images/n1.jpg" height="417" width="626"/></a>
                                    </div>
                                    <div class="title">
                                        <h2><a href="">انواع جدید واکسن کرونا</a></h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="news-items-box">
                        <div class="news-items">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="news-image">
                                        <a href="">
                                            <img src="{{ url('ivna-theme') }}/assets/images/derbi.jpg" height="120" width="180"/>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="news-caption">
                                        <div class="news-titr">
                                            <p>
                                                ایونا گزارش می دهد:
                                            </p>
                                        </div>
                                        <div class="news-title">
                                            <h2>
                                                <a href="">
                                                    فوری: تاریخ دربی پایتخت مشخص شد
                                                </a>
                                            </h2>
                                        </div>
                                        <div class="news-desc">
                                            <p>
                                                بر اساس اعلام سازمان لیگ تیمهای پرسپولیس و استقلال روز 13 آذر به مصاف هم خواهند رفت.
                                            </p>
                                        </div>
                                        <div class="comment">
                                            <div class="idea">
                                                <a href="#">
                                                    <i class="fa fa-comment-o"></i>
                                                </a>
                                                <a href="" class="set-comment">
                                                    نظر بدهید
                                                </a>
                                            </div>
                                            <div class="idea-numbers">
                                                <a href="" class="published-comment">
                                                    نظرات منتشر شده:
                                                    <span class="comment-numbers">3</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="news-items">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="news-image">
                                        <a href="">
                                            <img src="{{ url('ivna-theme') }}/assets/images/esteghlal.jpg" height="120" width="180"/>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="news-caption">
                                        <div class="news-titr">
                                            <p>
                                                ایونا گزارش می دهد:
                                            </p>
                                        </div>
                                        <div class="news-title">
                                            <h2>
                                                <a href="">
                                                    فوری: تاریخ دربی پایتخت مشخص شد
                                                </a>
                                            </h2>
                                        </div>
                                        <div class="news-desc">
                                            <p>
                                                بر اساس اعلام سازمان لیگ تیمهای پرسپولیس و استقلال روز 13 آذر به مصاف هم خواهند رفت.
                                            </p>
                                        </div>
                                        <div class="comment">
                                            <div class="idea">
                                                <a href="#">
                                                    <i class="fa fa-comment-o"></i>
                                                </a>
                                                <a href="" class="set-comment">
                                                    نظر بدهید
                                                </a>
                                            </div>
                                            <div class="idea-numbers">
                                                <a href="" class="published-comment">
                                                    نظرات منتشر شده:
                                                    <span class="comment-numbers">3</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="news-items">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="news-image">
                                        <a href="">
                                            <img src="{{ url('ivna-theme') }}/assets/images/1234.png" height="120" width="180"/>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="news-caption">
                                        <div class="news-titr">
                                            <p>
                                                ایونا گزارش می دهد:
                                            </p>
                                        </div>
                                        <div class="news-title">
                                            <h2>
                                                <a href="">
                                                    فوری: تاریخ دربی پایتخت مشخص شد
                                                </a>
                                            </h2>
                                        </div>
                                        <div class="news-desc">
                                            <p>
                                                بر اساس اعلام سازمان لیگ تیمهای پرسپولیس و استقلال روز 13 آذر به مصاف هم خواهند رفت.
                                            </p>
                                        </div>
                                        <div class="comment">
                                            <div class="idea">
                                                <a href="#">
                                                    <i class="fa fa-comment-o"></i>
                                                </a>
                                                <a href="" class="set-comment">
                                                    نظر بدهید
                                                </a>
                                            </div>
                                            <div class="idea-numbers">
                                                <a href="" class="published-comment">
                                                    نظرات منتشر شده:
                                                    <span class="comment-numbers">3</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="news-items">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="news-image">
                                        <a href="">
                                            <img src="{{ url('ivna-theme') }}/assets/images/bazdid.jpg" height="120" width="180"/>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="news-caption">
                                        <div class="news-titr">
                                            <p>
                                                ایونا گزارش می دهد:
                                            </p>
                                        </div>
                                        <div class="news-title">
                                            <h2>
                                                <a href="">
                                                    فوری: تاریخ دربی پایتخت مشخص شد
                                                </a>
                                            </h2>
                                        </div>
                                        <div class="news-desc">
                                            <p>
                                                بر اساس اعلام سازمان لیگ تیمهای پرسپولیس و استقلال روز 13 آذر به مصاف هم خواهند رفت.
                                            </p>
                                        </div>
                                        <div class="comment">
                                            <div class="idea">
                                                <a href="#">
                                                    <i class="fa fa-comment-o"></i>
                                                </a>
                                                <a href="" class="set-comment">
                                                    نظر بدهید
                                                </a>
                                            </div>
                                            <div class="idea-numbers">
                                                <a href="" class="published-comment">
                                                    نظرات منتشر شده:
                                                    <span class="comment-numbers">3</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="news-items">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="news-image">
                                        <a href="">
                                            <img src="{{ url('ivna-theme') }}/assets/images/artesh.jpg" height="120" width="180"/>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="news-caption">
                                        <div class="news-titr">
                                            <p>
                                                ایونا گزارش می دهد:
                                            </p>
                                        </div>
                                        <div class="news-title">
                                            <h2>
                                                <a href="">
                                                    فوری: تاریخ دربی پایتخت مشخص شد
                                                </a>
                                            </h2>
                                        </div>
                                        <div class="news-desc">
                                            <p>
                                                بر اساس اعلام سازمان لیگ تیمهای پرسپولیس و استقلال روز 13 آذر به مصاف هم خواهند رفت.
                                            </p>
                                        </div>
                                        <div class="comment">
                                            <div class="idea">
                                                <a href="#">
                                                    <i class="fa fa-comment-o"></i>
                                                </a>
                                                <a href="" class="set-comment">
                                                    نظر بدهید
                                                </a>
                                            </div>
                                            <div class="idea-numbers">
                                                <a href="" class="published-comment">
                                                    نظرات منتشر شده:
                                                    <span class="comment-numbers">3</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="news-items">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="news-image">
                                        <a href="">
                                            <img src="{{ url('ivna-theme') }}/assets/images/politics.jpg" height="120" width="180"/>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="news-caption">
                                        <div class="news-titr">
                                            <p>
                                                ایونا گزارش می دهد:
                                            </p>
                                        </div>
                                        <div class="news-title">
                                            <h2>
                                                <a href="">
                                                    فوری: تاریخ دربی پایتخت مشخص شد
                                                </a>
                                            </h2>
                                        </div>
                                        <div class="news-desc">
                                            <p>
                                                بر اساس اعلام سازمان لیگ تیمهای پرسپولیس و استقلال روز 13 آذر به مصاف هم خواهند رفت.
                                            </p>
                                        </div>
                                        <div class="comment">
                                            <div class="idea">
                                                <a href="#">
                                                    <i class="fa fa-comment-o"></i>
                                                </a>
                                                <a href="" class="set-comment">
                                                    نظر بدهید
                                                </a>
                                            </div>
                                            <div class="idea-numbers">
                                                <a href="" class="published-comment">
                                                    نظرات منتشر شده:
                                                    <span class="comment-numbers">3</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="news-items">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="news-image">
                                        <a href="">
                                            <img src="{{ url('ivna-theme') }}/assets/images/goje.jpg" height="120" width="180"/>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="news-caption">
                                        <div class="news-titr">
                                            <p>
                                                ایونا گزارش می دهد:
                                            </p>
                                        </div>
                                        <div class="news-title">
                                            <h2>
                                                <a href="">
                                                    فوری: تاریخ دربی پایتخت مشخص شد
                                                </a>
                                            </h2>
                                        </div>
                                        <div class="news-desc">
                                            <p>
                                                بر اساس اعلام سازمان لیگ تیمهای پرسپولیس و استقلال روز 13 آذر به مصاف هم خواهند رفت.
                                            </p>
                                        </div>
                                        <div class="comment">
                                            <div class="idea">
                                                <a href="#">
                                                    <i class="fa fa-comment-o"></i>
                                                </a>
                                                <a href="" class="set-comment">
                                                    نظر بدهید
                                                </a>
                                            </div>
                                            <div class="idea-numbers">
                                                <a href="" class="published-comment">
                                                    نظرات منتشر شده:
                                                    <span class="comment-numbers">3</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="news-items">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="news-image">
                                        <a href="">
                                            <img src="{{ url('ivna-theme') }}/assets/images/3226793.jpg" height="120" width="180"/>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="news-caption">
                                        <div class="news-titr">
                                            <p>
                                                ایونا گزارش می دهد:
                                            </p>
                                        </div>
                                        <div class="news-title">
                                            <h2>
                                                <a href="">
                                                    فوری: تاریخ دربی پایتخت مشخص شد
                                                </a>
                                            </h2>
                                        </div>
                                        <div class="news-desc">
                                            <p>
                                                بر اساس اعلام سازمان لیگ تیمهای پرسپولیس و استقلال روز 13 آذر به مصاف هم خواهند رفت.
                                            </p>
                                        </div>
                                        <div class="comment">
                                            <div class="idea">
                                                <a href="#">
                                                    <i class="fa fa-comment-o"></i>
                                                </a>
                                                <a href="" class="set-comment">
                                                    نظر بدهید
                                                </a>
                                            </div>
                                            <div class="idea-numbers">
                                                <a href="" class="published-comment">
                                                    نظرات منتشر شده:
                                                    <span class="comment-numbers">3</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="news-items">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="news-image">
                                        <a href="">
                                            <img src="{{ url('ivna-theme') }}/assets/images/artesh.jpg" height="120" width="180"/>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="news-caption">
                                        <div class="news-titr">
                                            <p>
                                                ایونا گزارش می دهد:
                                            </p>
                                        </div>
                                        <div class="news-title">
                                            <h2>
                                                <a href="">
                                                    فوری: تاریخ دربی پایتخت مشخص شد
                                                </a>
                                            </h2>
                                        </div>
                                        <div class="news-desc">
                                            <p>
                                                بر اساس اعلام سازمان لیگ تیمهای پرسپولیس و استقلال روز 13 آذر به مصاف هم خواهند رفت.
                                            </p>
                                        </div>
                                        <div class="comment">
                                            <div class="idea">
                                                <a href="#">
                                                    <i class="fa fa-comment-o"></i>
                                                </a>
                                                <a href="" class="set-comment">
                                                    نظر بدهید
                                                </a>
                                            </div>
                                            <div class="idea-numbers">
                                                <a href="" class="published-comment">
                                                    نظرات منتشر شده:
                                                    <span class="comment-numbers">3</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="news-items">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="news-image">
                                        <a href="">
                                            <img src="{{ url('ivna-theme') }}/assets/images/politics.jpg" height="120" width="180"/>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="news-caption">
                                        <div class="news-titr">
                                            <p>
                                                ایونا گزارش می دهد:
                                            </p>
                                        </div>
                                        <div class="news-title">
                                            <h2>
                                                <a href="">
                                                    فوری: تاریخ دربی پایتخت مشخص شد
                                                </a>
                                            </h2>
                                        </div>
                                        <div class="news-desc">
                                            <p>
                                                بر اساس اعلام سازمان لیگ تیمهای پرسپولیس و استقلال روز 13 آذر به مصاف هم خواهند رفت.
                                            </p>
                                        </div>
                                        <div class="comment">
                                            <div class="idea">
                                                <a href="#">
                                                    <i class="fa fa-comment-o"></i>
                                                </a>
                                                <a href="" class="set-comment">
                                                    نظر بدهید
                                                </a>
                                            </div>
                                            <div class="idea-numbers">
                                                <a href="" class="published-comment">
                                                    نظرات منتشر شده:
                                                    <span class="comment-numbers">3</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="news-items">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="news-image">
                                        <a href="">
                                            <img src="{{ url('ivna-theme') }}/assets/images/2738448.jpg" height="120" width="180"/>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="news-caption">
                                        <div class="news-titr">
                                            <p>
                                                ایونا گزارش می دهد:
                                            </p>
                                        </div>
                                        <div class="news-title">
                                            <h2>
                                                <a href="">
                                                    فوری: تاریخ دربی پایتخت مشخص شد
                                                </a>
                                            </h2>
                                        </div>
                                        <div class="news-desc">
                                            <p>
                                                بر اساس اعلام سازمان لیگ تیمهای پرسپولیس و استقلال روز 13 آذر به مصاف هم خواهند رفت.
                                            </p>
                                        </div>
                                        <div class="comment">
                                            <div class="idea">
                                                <a href="#">
                                                    <i class="fa fa-comment-o"></i>
                                                </a>
                                                <a href="" class="set-comment">
                                                    نظر بدهید
                                                </a>
                                            </div>
                                            <div class="idea-numbers">
                                                <a href="" class="published-comment">
                                                    نظرات منتشر شده:
                                                    <span class="comment-numbers">3</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="news-items">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="news-image">
                                        <a href="">
                                            <img src="{{ url('ivna-theme') }}/assets/images/3226699.jpg" height="120" width="180"/>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="news-caption">
                                        <div class="news-titr">
                                            <p>
                                                ایونا گزارش می دهد:
                                            </p>
                                        </div>
                                        <div class="news-title">
                                            <h2>
                                                <a href="">
                                                    فوری: تاریخ دربی پایتخت مشخص شد
                                                </a>
                                            </h2>
                                        </div>
                                        <div class="news-desc">
                                            <p>
                                                بر اساس اعلام سازمان لیگ تیمهای پرسپولیس و استقلال روز 13 آذر به مصاف هم خواهند رفت.
                                            </p>
                                        </div>
                                        <div class="comment">
                                            <div class="idea">
                                                <a href="#">
                                                    <i class="fa fa-comment-o"></i>
                                                </a>
                                                <a href="" class="set-comment">
                                                    نظر بدهید
                                                </a>
                                            </div>
                                            <div class="idea-numbers">
                                                <a href="" class="published-comment">
                                                    نظرات منتشر شده:
                                                    <span class="comment-numbers">3</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
                <div class="col-md-3">
                    <div class="advertising">
                        <div class="advertising-box">
                            <a href="">
                                <img src="{{ url('ivna-theme') }}/assets/images/12.gif" height="75" width="290"/>
                            </a>
                        </div>
                        <div class="advertising-box">
                            <a href="">
                                <img src="{{ url('ivna-theme') }}/assets/images/13.gif" height="75" width="290"/>
                            </a>
                        </div>
                        <div class="advertising-box">
                            <a href="">
                                <img src="{{ url('ivna-theme') }}/assets/images/14.gif" height="75" width="290"/>
                            </a>
                        </div>
                        <div class="advertising-box">
                            <a href="">
                                <img src="{{ url('ivna-theme') }}/assets/images/15.gif" height="75" width="290"/>
                            </a>
                        </div>
                        <div class="advertising-box">
                            <a href="">
                                <img src="{{ url('ivna-theme') }}/assets/images/2925461.jpg" height="70" width="295"/>
                            </a>
                        </div>
                        <div class="advertising-box">
                            <a href="">
                                <img src="{{ url('ivna-theme') }}/assets/images/3087041.jpg" height="75" width="290"/>
                            </a>
                        </div>
                        <div class="advertising-box">
                            <a href="">
                                <img src="{{ url('ivna-theme') }}/assets/images/3106730.gif" height="75" width="290"/>
                            </a>
                        </div>
                        <div class="advertising-box">
                            <a href="">
                                <img src="{{ url('ivna-theme') }}/assets/images/3157882.jpg" height="75" width="290"/>
                            </a>
                        </div>
                        <div class="advertising-box">
                            <a href="">
                                <img src="{{ url('ivna-theme') }}/assets/images/top.gif" height="75" width="290"/>
                            </a>
                        </div>
                        <div class="advertising-box">
                            <a href="">
                                <img src="{{ url('ivna-theme') }}/assets/images/top2.gif" height="75" width="290"/>
                            </a>
                        </div>
                        <div class="advertising-box">
                            <a href="">
                                <img src="{{ url('ivna-theme') }}/assets/images/right.jpg" height="75" width="290"/>
                            </a>
                        </div>
                    </div>
                    <div class="newspaper">
                        <div class="newspaper-title">
                            <hr>
                            <h2>
                                <a href="">
                                    صفحه اول روزنامه ها
                                </a>
                            </h2>

                        </div>
                        <div class="newspaper-image">
                            <a href="">
                                <img src="{{ url('ivna-theme') }}/assets/images/1234.PNG" height="225" width="306"/>
                            </a>
                        </div>
                        <span class="newspaper-desc">
                                    روزنامه های ورزشی
                                </span>
                        <span class="date">
                                    سه شنبه 7 دی
                                </span>
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
    <script src="{{ url('ivna-theme') }}/assets/bootstrap/bootstrap-5.1.0-dist/bootstrap-5.1.0-dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
            integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
            crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
            integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $('.slider1').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1000: {
                    items: 1
                }
            }
        });
    </script>
    </body>

@endsection
