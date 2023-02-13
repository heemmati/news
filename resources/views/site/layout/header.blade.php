<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">


    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @yield('seos')

    <link rel="stylesheet" href="{{ url('hadiloo-theme') }}/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="{{ url('hadiloo-theme') }}/css/animate.css"/>
    <link rel="stylesheet" href="{{ url('hadiloo-theme') }}/css/owl.carousel.min.css"/>
    <link rel="stylesheet" href="{{ url('hadiloo-theme') }}/css/owl.theme.default.min.css"/>
    <link rel="stylesheet" href="{{ url('hadiloo-theme') }}/css/style.css"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
          integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <script src="{{ url('hadiloo-theme') }}/js/jquery.min.js"></script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-X39RZ5CPZS"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-X39RZ5CPZS');
</script>

</head>
<body>

<div class="header-fix">

    <div id="top-header" class="top-header">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6">
                      <div class="date">
                        {{ $today }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <div class="saerch">
                        <form action="{{ route('site.search') }}" method="get">
                            <input type="text" placeholder="جستجو..." name="search">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div id="middle-header" class="middle-header">
        <div class="container">
            <div class="row">

           

                <div class="hidden-xs col-sm-4">

                    <div class="logo10"><img class="tp-logo" alt="logo"
                                             src="https://www.sahandpress.ir/storage//photos/1/Sahandpressw.png"></div>


                </div>
                <div class="hidden-xs col-sm-4">
                    <!--<div class="logo2"><img class="tp-logo" alt="logo"-->
                    <!--                        src="{{ url('hadiloo-theme') }}/images/logo2.png"></div>-->
                </div>


            </div>
        </div>
    </div>
    <div id="bottom-header" class="bottom-header">


        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12">
                    <div class="backBtn d-block d-sm-none bars-menu " id="showRight">
                        <span class="open-menu">   <i class="fas fa-bars"></i>  </span>
                    </div>
                    <nav class="menu1 hemmat_menu menu-right header--nav" id="menu-right1">
                        <div class="close-menu d-block d-sm-none"><i class="fas fa-times"></i></div>
                        <li class="{{ str_replace('%2F', '/', str_replace('%3A', ':', urlencode(url('/')))) == \URL::current() ? 'active' : '' }}" ><a href="{{  url('/') }}" > صفحه اصلی </a></li>
                        @if (isset($categories) && !empty($categories))
                            @foreach($categories as $category)
            
           
          
                       
                                <li class="{{ str_replace('%2F', '/', str_replace('%3A', ':', urlencode(url($category->path())))) == \URL::current() ? 'active' : '' }}"><a href="{{ $category->path() }}"> {{ $category->title   }} </a>
                                @if (!empty($category->children) && isset($category->children) && count($category->children))
                                        <ul>
                                        @foreach($category->children as $category2)

                                <li>
                                    <a href="{{ $category2->path() }}"> {{ $category2->title   }} </a>


                                    @endforeach
                                        </ul>
                                @endif
                                </li>
                            @endforeach
                        @endif





                    </nav>
                </div>
               


            </div>


            <script>
                var html = document.documentElement; // pega o elemento HTML da página

                document.querySelector('.open-menu').onclick = function () {
                    html.classList.add('active5');
                };

                document.querySelector('.close-menu').onclick = function () {
                    html.classList.remove('active5');
                };

                html.onclick = function (event) {
                    if (event.target === html) {
                        html.classList.remove('active5');
                    }
                };

            </script>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('.visible-fix21').hover(function () {

            $('.fix-menu').toggleClass(' fix-menu-open1');
        });
    });


    $(document).ready(function () {
        $('#showRight').click(function () {

            $('#menu-right1').toggleClass('right-open1');
        });
        $('.backBtn').click(function () {
            $('#menu-right1').toggleClass('right-open');
        });
    });
</script>
<script>

</script>

@yield('scripts')
