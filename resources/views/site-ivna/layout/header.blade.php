<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    @yield('seos')

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="bootstrap/bootstrap-5.1.0-dist/bootstrap-5.1.0-dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link href="{{ url('ivna-theme') }}/OwlCarousel2-2.3.4/OwlCarousel2-2.3.4/dist/assets/owl.carousel.min.css"
          rel="stylesheet"
          type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css"
          integrity="sha512-OTcub78R3msOCtY3Tc6FzeDJ8N9qvQn1Ph49ou13xgA9VsH9+LRxoFU6EqLhW4+PKRfU+/HReXmSZXHEkpYoOA=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ url('ivna-theme') }}/assets/sass/index.css">
    <script src="{{ url('ivna-theme') }}/assets/js/mainjs.js"></script>


    @ischeck($general['logo'])
    <link rel="shortcut icon" href="{{ \Illuminate\Support\Facades\Storage::url($general['logo']->print) }}"
          type="image/png">
    @endischeck


    @yield('stylus')
</head>
<body>
<header>
    <div class="header">
        <div class="container">
            <div class="header-bg">
                <div class="header-links">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="pages">
                                <ul>
                                    <li>
                                        <a href="{{ route('site.images') }}">
                                            عکس
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('site.videos') }}">
                                            فیلم
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('site.about') }}">
                                            درباره ما
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('site.contact') }}">
                                            تماس با ما
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="social-media">
                                <ul>

                                    <li>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="6.733" height="12"
                                             viewBox="0 0 6.733 12">
                                            <g id="Group_1770" data-name="Group 1770" transform="translate(244 -11.79)">
                                                <g id="_003-facebook" data-name="003-facebook"
                                                   transform="translate(-244 11.79)">
                                                    <g id="Group_1283" data-name="Group 1283" transform="translate(0)">
                                                        <path id="Path_1205" data-name="Path 1205"
                                                              d="M4.208,4.125v-1.5a.8.8,0,0,1,.842-.75h.842V0H4.208A2.4,2.4,0,0,0,1.683,2.25V4.125H0V6H1.683v6H4.208V6H5.892l.842-1.875Z"
                                                              fill="#385999"/>
                                                    </g>
                                                </g>
                                            </g>
                                        </svg>
                                        <a href="{{ $socials['facebook']->print }}">
                                            فیسبوک
                                        </a>
                                    </li>
                                    <li>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16.696" height="13.995"
                                             viewBox="0 0 16.696 13.995">
                                            <g id="_001-twitter-logo-silhouette" data-name="001-twitter-logo-silhouette"
                                               transform="translate(1.67) rotate(8)">
                                                <g id="Group_1280" data-name="Group 1280" transform="translate(0 0)">
                                                    <path id="Path_1202" data-name="Path 1202"
                                                          d="M15.174,1.42a6.349,6.349,0,0,1-1.787.477A3.059,3.059,0,0,0,14.755.222a6.38,6.38,0,0,1-1.978.736A3.144,3.144,0,0,0,10.505,0,3.073,3.073,0,0,0,7.392,3.03a2.962,2.962,0,0,0,.081.691A8.919,8.919,0,0,1,1.057.554,2.947,2.947,0,0,0,.636,2.077,3.009,3.009,0,0,0,2.021,4.6a3.178,3.178,0,0,1-1.41-.38v.038a3.055,3.055,0,0,0,2.5,2.972,3.234,3.234,0,0,1-.82.106A3.066,3.066,0,0,1,1.7,7.278a3.105,3.105,0,0,0,2.907,2.1,6.354,6.354,0,0,1-3.866,1.3A6.793,6.793,0,0,1,0,10.636,8.973,8.973,0,0,0,4.771,12a8.673,8.673,0,0,0,8.856-8.622l-.01-.392A6.129,6.129,0,0,0,15.174,1.42Z"
                                                          transform="translate(0 0)" fill="#54aeef"/>
                                                </g>
                                            </g>
                                        </svg>
                                        <a href="{{ $socials['twitter']->print }}">
                                            توییتر
                                        </a>
                                    </li>
                                    <li>
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             xmlns:xlink="http://www.w3.org/1999/xlink" id="instagram_1_"
                                             data-name="instagram(1)" width="12" height="12" viewBox="0 0 12 12">
                                            <defs>
                                                <linearGradient id="linear-gradient" x1="0.5" y1="0.008" x2="0.5"
                                                                y2="0.998" gradientUnits="objectBoundingBox">
                                                    <stop offset="0" stop-color="#e09b3d"/>
                                                    <stop offset="0.3" stop-color="#c74c4d"/>
                                                    <stop offset="0.6" stop-color="#c21975"/>
                                                    <stop offset="1" stop-color="#7024c4"/>
                                                </linearGradient>
                                                <linearGradient id="linear-gradient-2" y1="-0.451" y2="1.462"
                                                                xlink:href="#linear-gradient"/>
                                                <linearGradient id="linear-gradient-3" y1="-1.396" y2="6.586"
                                                                xlink:href="#linear-gradient"/>
                                            </defs>
                                            <path id="Path_1458" data-name="Path 1458"
                                                  d="M8.425,0H3.575A3.579,3.579,0,0,0,0,3.575v4.85A3.579,3.579,0,0,0,3.575,12h4.85A3.579,3.579,0,0,0,12,8.425V3.575A3.579,3.579,0,0,0,8.425,0Zm2.368,8.425a2.368,2.368,0,0,1-2.368,2.368H3.575A2.368,2.368,0,0,1,1.207,8.425V3.575A2.368,2.368,0,0,1,3.575,1.207h4.85a2.368,2.368,0,0,1,2.368,2.368v4.85Z"
                                                  fill="url(#linear-gradient)"/>
                                            <path id="Path_1459" data-name="Path 1459"
                                                  d="M135.49,133a2.49,2.49,0,1,0,2.49,2.49A2.493,2.493,0,0,0,135.49,133Zm0,4.012a1.522,1.522,0,1,1,1.522-1.522A1.522,1.522,0,0,1,135.49,137.012Z"
                                                  transform="translate(-129.49 -129.49)"
                                                  fill="url(#linear-gradient-2)"/>
                                            <circle id="Ellipse_92" data-name="Ellipse 92" cx="0.756" cy="0.756"
                                                    r="0.756" transform="translate(8.346 2.171)"
                                                    fill="url(#linear-gradient-3)"/>
                                        </svg>
                                        <a href="{{ $socials['instagram']->print }}">
                                            اینستاگرام
                                        </a>
                                    </li>
                                    <li>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14.4" height="12"
                                             viewBox="0 0 14.4 12">
                                            <path id="telegram"
                                                  d="M5.65,9.908l-.238,3.35a.833.833,0,0,0,.665-.322l1.6-1.527,3.311,2.425c.607.338,1.035.16,1.2-.559L14.358,3.092h0c.193-.9-.325-1.249-.916-1.028L.668,6.954C-.2,7.292-.19,7.778.52,8L3.786,9.014l7.586-4.747c.357-.236.682-.106.415.131Z"
                                                  transform="translate(0 -2)" fill="#039be5"/>
                                        </svg>
                                        <a href="{{ $socials['telegram']->print }}">
                                            تلگرام
                                        </a>
                                    </li>
                                    <li>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="11.985" height="12"
                                             viewBox="0 0 11.985 12">
                                            <g id="Group_6222" data-name="Group 6222" transform="translate(0 0)">
                                                <g id="logo_aparat" data-name="logo aparat" transform="translate(0 0)">
                                                    <path id="Path_1" data-name="Path 1"
                                                          d="M10.5.343,9.433.056a1.631,1.631,0,0,0-2,1.152L7.15,2.274A5.238,5.238,0,0,1,10.5.343"
                                                          transform="translate(-5.751 0)"/>
                                                    <path id="Path_2" data-name="Path 2"
                                                          d="M46.4,10.612l.287-1.067a1.631,1.631,0,0,0-1.166-1.986l-1.067-.287a5.238,5.238,0,0,1,1.932,3.347"
                                                          transform="translate(-34.758 -5.849)"/>
                                                    <path id="Path_3" data-name="Path 3"
                                                          d="M.343,31.935.055,33a1.631,1.631,0,0,0,1.152,2l1.067.287A5.238,5.238,0,0,1,.343,31.938"
                                                          transform="translate(0 -24.685)"/>
                                                    <path id="Path_4" data-name="Path 4"
                                                          d="M31.865,46.513l1.067.287a1.631,1.631,0,0,0,2-1.152l.287-1.067a5.238,5.238,0,0,1-3.347,1.932"
                                                          transform="translate(-24.629 -34.855)"/>
                                                    <path id="Path_5" data-name="Path 5"
                                                          d="M10.263,3.872A5.286,5.286,0,1,0,14,10.346v0a5.286,5.286,0,0,0-3.737-6.472m-2.311,1.4A1.454,1.454,0,1,1,6.174,6.3v0A1.453,1.453,0,0,1,7.953,5.273M6.231,11.691a1.454,1.454,0,1,1,1.779-1.03v0a1.453,1.453,0,0,1-1.778,1.027m2.05-2.9a.646.646,0,1,1,.458.79h0a.646.646,0,0,1-.457-.789M9.84,12.672a1.454,1.454,0,1,1,1.779-1.03v0A1.453,1.453,0,0,1,9.84,12.672m.97-3.625a1.454,1.454,0,1,1,1.779-1.03v0A1.453,1.453,0,0,1,10.81,9.047"
                                                          transform="translate(-2.902 -2.968)" fill="#eb195b"/>
                                                </g>
                                            </g>
                                        </svg>
                                        <a href="{{ $socials['aparat']->print }}">
                                            آپارات
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="header-box">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="logo">
                                <a href="{{ url('/') }}">

                                    @ischeck($general['logo'])
                                    <img src="{{ \Illuminate\Support\Facades\Storage::url($general['logo']->print) }}"
                                         height="70" width="294" alt="{{ __('site.site_name') }}">
                                    @endischeck

                                </a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="header-item">
                                <div class="date-box">
                                    <i class="fa fa-clock"></i>
                                    <span class="persian-date">
                                        {{ $today }}
                                    </span>
                                    <span class="english-date">{{ $en_today }}</span>
                                </div>
                                <div class="search-box">
                                    <form action="{{ route('site.search') }}" method="get">
                                        <input type="text" placeholder=" جستجو ..." name="search">
                                        <img src="{{ url('ivna-theme') }}/images/main-page-images/Search.png"
                                             height="14" width="14"/>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="menu">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light ">
                <a class="navbar-brand" href="#"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ url('/') }}">خانه <span class="sr-only">(current)</span></a>


                        </li>
                        @if(isset($categories) && !empty($categories) && count($categories) > 0)
                            @foreach($categories as $category)
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ $category->path() }}">{{ $category->title }}</a>
                                    @if(isset($category->children) && !empty($category->children) && count($category->children) > 0)
                                        <i class="fa fa-angle-down"></i>
                                        <div class="sub-menu">
                                            <ul>
                                                @foreach($category->children as $child)
                                                    <li>
                                                        <a href="{{ $child->path() }}">
                                                            {{ $child->title }}
                                                        </a>

                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

                                </li>
                            @endforeach
                        @endif

                    </ul>
                </div>
            </nav>
        </div>
    </div>
</header>


