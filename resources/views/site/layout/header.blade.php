<!DOCTYPE html>
<html dir="rtl" lang="fa-IR" dir="rtl">

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="Content-Language" content="fa">
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no, width=device-width">

    @yield('seos')



    @ischeck($general['logo'])
    <link rel="shortcut icon" href="{{ \Illuminate\Support\Facades\Storage::url($general['logo']->print) }}" type="image/png">
    @endischeck




    <link href="{{ url('taj-theme') }}/assets/css/style.css" rel="stylesheet" type="text/css"/>
    <link href="{{ url('taj-theme') }}/assets/css/responsive.css" rel="stylesheet" type="text/css">
    <link href="{{ url('taj-theme') }}/assets/css/font-awesome/css/font-awesome.min.css" rel="stylesheet"
          type="text/css"/>
    <link href="{{ url('taj-theme') }}/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <script type="text/javascript" src="{{ url('taj-theme') }}/assets/js/jquery.js"></script>
    <script type="text/javascript" src="{{ url('taj-theme') }}/assets/js/menu-java.js"></script>


<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-DC77J8VLBX"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-DC77J8VLBX');
</script>



</head>

<body>
<div class="top-m">
    <div class="container">
        <div class="top-nav-1">
            <div>
                <ul class="menu">



                    <li class="menu-item menu-item-type-taxonomy menu-item-object-media_category menu-item-has-children ">
                        <a
                            href="{{ route('site.videos') }}">فیلم</a>

                    </li>

                    <li><a href="{{ route('site.images') }}">
                           عکس
                        </a></li>


                    <li><a href="{{ route('site.about') }}">درباره
                            ما</a></li>
                    <li><a href="{{ route('site.contact') }}">تماس
                            با ما</a></li>
                </ul>
            </div>
        </div>
        <ul class="header-social">
            <li class="facebook"><a href="{{ $socials['facebook']->print }}"></a></li>
            <li class="twitter"><a href="{{ $socials['twitter']->print }}"></a></li>
            <li class="instagram"><a href="{{ $socials['instagram']->print }}"></a></li>
            <li class="telegram"><a href="{{ $socials['telegram']->print }}"></a></li>

{{--            <li class="rss"><a href="{{ url('/') }}/feed/rss/"></a></li>--}}
        </ul>
    </div>
</div>
<header id="header">
    <div class="container">
        <div id="logo">
            <a href="{{ url('/') }}">
                @ischeck($general['logo'])
                <img src="{{ \Illuminate\Support\Facades\Storage::url($general['logo']->print) }}" alt="{{ $general['logo']->title }}">
                @endischeck

                <h1>@lang('site.site_name')</h1>

            </a>
        </div><!-- logo -->
        <div class="pull-left hidden-sm hidden-xs clearfix" id="social-icons">
            <ul class="clearfix">
                <li>
                    <form role="search" method="get" class="searchform" action="{{ route('site.search') }}">
                        <input type="text" class="search-field" placeholder="جستجو کن ..." value="" name="search"/>
                    </form>
                </li>
                <li>
                    <div>
                        <ul class="menu">
                           <li><a href="">خوراک</a></li>
                        <li><a href="http://#">آب
                               و هوا</a></li>
                        <li><a href="http://#">قیمت
                               ها</a></li>
                      <li><a href="http://#">اوقات
                                 شرعی</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
            <div id="date">
                {{ $today }}
                <br> <span>
                    {{ $en_today }}
                </span></div>
        </div>
        <!--/#social-icons-->
    </div>
    <!--/.container-fluid-->
</header>
<div class="container">
    <div class="primary-nav">
        <ul class="menu">
            <li><a href="{{ url('/') }}">صفحه اصلی</a></li>

            @if (isset($categories) && !empty($categories))
                @foreach($categories as $category)




                    <li class="menu-item menu-item-type-taxonomy menu-item-object-category   {{ str_replace('%2F', '/', str_replace('%3A', ':', urlencode(url($category->path())))) == \URL::current() ? 'active' : '' }}"><a href="{{ $category->path() }}"> {{ $category->title   }} </a>
                        @if (!empty($category->children) && isset($category->children) && count($category->children))
                            <ul>
                                @foreach($category->children as $category2)

                                    <li>
                                        <a href="{{ $category2->path() }}"> {{ $category2->title   }} </a>

                                    </li>


                                @endforeach
                            </ul>
                        @endif
                    </li>
                @endforeach
            @endif

        </ul>
    </div>
    <div class="menu-bottom"><span class="fa fa-bars navbar-c-toggle menu-show"></span></div>
</div>
<div id="lin-10"></div>
<div class="menu-hidden menu-show" id="menu-risponsive">
    <div id="lin-top">
        <center>
            <form role="search" method="get" class="searchform" action="{{ url('/') }}">
                <input type="text" class="search-field" placeholder="جستجو کن ..." value="" name="search"/></form>
            <ul class="header-social">
                <li class="facebook"><a href="آدرس لینک شما"></a></li>
                <li class="twitter"><a href="آدرس لینک شما"></a></li>
                <li class="instagram"><a href="آدرس لینک شما"></a></li>
                <li class="telegram"><a href="آدرس لینک شما"></a></li>
                <li class="googleplus"><a href="آدرس لینک شما"></a></li>
                <li class="aparat"><a href="آدرس لینک شما"></a>
                <li class="youtube"><a href="آدرس لینک شما"></a>
                <li class="rss"><a href="{{ url('/') }}/feed/rss/"></a></li>


            </ul>
        </center>
    </div>
    <div>
        <ul class="menu">
            <li><a href="{{ url('/') }}/">خانه</a></li>
            <li><a href="{{ url('/') }}/category/news/">آخرین
                    اخبار</a>
                <ul class="sub-menu">
                    <li><a href="{{ url('/') }}/category/news/%d8%a7%d8%ac%d8%aa%d9%85%d8%a7%d8%b9%db%8c/">اجتماعی</a>
                        <ul>
                            <li><a href="">زیرمنو</a>
                                <ul>
                                    <li><a href="">زیرمنو</a>
                                        <ul>
                                            <li><a href="">زیرمنو</a></li>
                                            <li><a href="">زیرمنو</a></li>
                                            <li><a href="">زیرمنو</a></li>
                                            <li><a href="">زیرمنو</a></li>
                                            <li><a href="">زیرمنو</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="">زیرمنو</a></li>
                                    <li><a href="">زیرمنو</a></li>
                                    <li><a href="">زیرمنو</a></li>
                                    <li><a href="">زیرمنو</a></li>
                                </ul>
                            </li>
                            <li><a href="">زیرمنو</a>
                                <ul>
                                    <li><a href="">زیرمنو</a></li>
                                    <li><a href="">زیرمنو</a></li>
                                    <li><a href="">زیرمنو</a></li>
                                    <li><a href="">زیرمنو</a></li>
                                    <li><a href="">زیرمنو</a></li>
                                </ul>
                            </li>
                            <li><a href="">زیرمنو</a>
                                <ul>
                                    <li><a href="">زیرمنو</a></li>
                                    <li><a href="">زیرمنو</a></li>
                                    <li><a href="">زیرمنو</a></li>
                                    <li><a href="">زیرمنو</a></li>
                                    <li><a href="">زیرمنو</a></li>
                                </ul>
                            </li>
                            <li><a href="">زیرمنو</a></li>
                            <li><a href="">زیرمنو</a></li>
                        </ul>
                    </li>
                    <li class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-has-children"><a
                            href="{{ url('/') }}/category/news/%d8%a7%d9%82%d8%aa%d8%b5%d8%a7%d8%af%db%8c/">اقتصادی</a>
                        <ul>
                            <li><a href="">زیرمنو</a></li>
                            <li><a href="">زیرمنو</a></li>
                            <li><a href="">زیرمنو</a></li>
                            <li><a href="">زیرمنو</a></li>
                            <li><a href="">زیرمنو</a></li>
                        </ul>
                    </li>
                    <li class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-has-children"><a
                            href="{{ url('/') }}/category/news/%d8%b3%db%8c%d8%a7%d8%b3%db%8c/">سیاسی</a>
                        <ul>
                            <li><a href="">زیرمنو</a></li>
                            <li><a href="">زیرمنو</a></li>
                            <li><a href="">زیرمنو</a></li>
                            <li><a href="">زیرمنو</a></li>
                            <li><a href="">زیرمنو</a></li>
                        </ul>
                    </li>
                    <li class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-has-children"><a
                            href="{{ url('/') }}/category/news/%d9%81%d8%b1%d9%87%d9%86%da%af%db%8c/">فرهنگی</a>
                        <ul>
                            <li><a href="">زیرمنو</a></li>
                            <li><a href="">زیرمنو</a></li>
                            <li><a href="">زیرمنو</a></li>
                            <li><a href="">زیرمنو</a></li>
                            <li><a href="">زیرمنو</a></li>
                        </ul>
                    </li>
                    <li class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-has-children"><a
                            href="{{ url('/') }}/category/news/%d9%88%d8%b1%d8%b2%d8%b4%db%8c/">ورزشی</a>
                        <ul>
                            <li><a href="">زیرمنو</a></li>
                            <li><a href="">زیرمنو</a></li>
                            <li><a href="">زیرمنو</a></li>
                            <li><a href="">زیرمنو</a></li>
                            <li><a href="">زیرمنو</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li><a href="{{ url('/') }}/category/%d8%a7%db%8c%d8%b1%d8%a7%d9%86/">ایران</a></li>
            <li><a href="{{ url('/') }}/category/%d8%a8%db%8c%d9%86-%d8%a7%d9%84%d9%85%d9%84%d9%84/">بین
                    الملل</a></li>
            <li>
                <a href="{{ url('/') }}/category/news/%d8%a7%d8%ac%d8%aa%d9%85%d8%a7%d8%b9%db%8c/">اجتماعی</a>
            </li>
            <li><a href="{{ url('/') }}/category/news/%d8%b3%db%8c%d8%a7%d8%b3%db%8c/">سیاسی</a></li>
            <li>
                <a href="{{ url('/') }}/category/news/%d8%a7%d9%82%d8%aa%d8%b5%d8%a7%d8%af%db%8c/">اقتصادی</a>
            </li>
            <li><a href="{{ url('/') }}/category/news/%d9%81%d8%b1%d9%87%d9%86%da%af%db%8c/">فرهنگی</a></li>
            <li><a href="{{ url('/') }}/category/%db%8c%d8%a7%d8%af%d8%af%d8%a7%d8%b4%d8%aa/">یادداشت</a>
            </li>
            <li class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-has-children"><a
                    href="{{ url('/') }}/category/%d8%a7%d8%b3%d8%aa%d8%a7%d9%86-%d9%87%d8%a7/">استان
                    ها</a>
                <ul class="sub-menu">
                    <li><a href="http://#">تهران</a></li>
                    <li><a href="http://#">همدان</a></li>
                    <li><a href="http://#">مشهد</a></li>
                    <li><a href="http://#">اصفهان</a></li>
                    <li><a href="http://#">شیراز</a></li>
                    <li><a href="http://#">تبریز</a></li>
                    <li><a href="http://#">مرکزی</a></li>
                    <li><a href="http://#">گیلان</a></li>
                    <li><a href="http://#">کردستان</a></li>
                    <li><a href="http://#">کرمانشاه</a></li>
                    <li><a href="http://#">یاسوج</a></li>
                </ul>
            </li>
            <li class="menu-item menu-item-type-taxonomy menu-item-object-gallery_category menu-item-has-children"><a
                    href="{{ url('/') }}/gallery_category/%d8%b9%da%a9%d8%b3/">عکس</a>
                <ul class="sub-menu">
                    <li><a href="{{ url('/') }}/gallery_category/%d9%85%d8%b0%d9%87%d8%a8%db%8c/">مذهبی</a>
                    </li>
                    <li><a href="{{ url('/') }}/gallery_category/%d8%b3%db%8c%d8%a7%d8%b3%db%8c/">سیاسی</a>
                    </li>
                </ul>
            </li>
            <li class="menu-item menu-item-type-taxonomy menu-item-object-media_category menu-item-has-children"><a
                    href="{{ url('/') }}/media_category/%d9%81%db%8c%d9%84%d9%85/">فیلم</a>
                <ul class="sub-menu">
                    <li><a href="{{ url('/') }}/media_category/%d8%b9%d9%84%d9%85%db%8c/">علمی</a></li>
                    <li><a href="{{ url('/') }}/media_category/%d9%85%d8%b0%d9%87%d8%a8%db%8c/">مذهبی</a>
                    </li>
                </ul>
            </li>
            <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children"><a
                    href="http://#">دموها</a>
                <ul class="sub-menu">
                    <li><a href="{{ url('/') }}/wp-content/uploads/2018/04/1.html">دموی
                            اول</a></li>
                    <li><a href="{{ url('/') }}/wp-content/uploads/2018/04/2.html">دموی
                            دوم</a></li>
                    <li><a href="{{ url('/') }}/wp-content/uploads/2018/04/3.html">دموی
                            سوم</a></li>
                </ul>
            </li>
        </ul>
    </div>
    <h2>دسترسی ها</h2>
    <div>
        <ul class="menu">
            <li class="menu-item menu-item-type-taxonomy menu-item-object-gallery_category menu-item-has-children  37">
                <a
                    href="{{ url('/') }}/gallery_category/%d8%b9%da%a9%d8%b3/">عکس</a>
                <ul class="sub-menu">
                    <li><a href="{{ url('/') }}/gallery_category/%d9%85%d8%b0%d9%87%d8%a8%db%8c/">مذهبی</a>
                    </li>
                    <li><a href="{{ url('/') }}/gallery_category/%d8%b3%db%8c%d8%a7%d8%b3%db%8c/">سیاسی</a>
                    </li>
                    <li><a href="{{ url('/') }}/gallery_category/%d9%88%d8%b1%d8%b2%d8%b4%db%8c/">ورزشی</a>
                    </li>
                </ul>
            </li>
            <li class="menu-item menu-item-type-taxonomy menu-item-object-media_category menu-item-has-children"><a
                    href="{{ url('/') }}/media_category/%d9%81%db%8c%d9%84%d9%85/">فیلم</a>
                <ul class="sub-menu">
                    <li><a href="{{ url('/') }}/media_category/%d8%b9%d9%84%d9%85%db%8c/">علمی</a></li>
                    <li><a href="{{ url('/') }}/media_category/%d9%85%d8%b0%d9%87%d8%a8%db%8c/">مذهبی</a>
                    </li>
                </ul>
            </li>
            <li><a href="{{ url('/') }}/abuot/">درباره
                    ما</a></li>
            <li><a href="{{ url('/') }}/cunect/">تماس
                    با ما</a></li>
        </ul>
    </div>
</div>
