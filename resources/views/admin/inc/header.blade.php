<!-- begin::header -->
<div class="header d-print-none">

    <div class="header-left">
        <div class="navigation-toggler">
            <a href="#" data-action="navigation-toggler">
                <i data-feather="menu"></i>
            </a>
        </div>
        <div class="header-logo">
            <a href={{ url('/' . config('app.locale')) }}>


               @ischeck($logo)
                    <img class="logo" width="100px" src="{{ \Illuminate\Support\Facades\Storage::url($logo->print) }}"
                         alt="{{ __('site.site_name') }}">



                    <img class="logo-light" width="100px"
                         src="{{ \Illuminate\Support\Facades\Storage::url($logo->print) }}"
                         alt="{{ __('site.site_name') }}">
              @endischeck
            </a>
        </div>
    </div>

    <div class="header-body">
        <div class="header-body-left">
            <div class="page-title">
                <h4>
                    <a href="{{ url('/') }}">
                        {{ __('site.site_name') }}
                    </a></h4>
            </div>
        </div>
        <div class="header-body-right">
            <ul class="navbar-nav">


                <!-- begin::header fullscreen -->
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link" title="Fullscreen" data-toggle="fullscreen">
                        <i class="maximize" data-feather="maximize"></i>
                        <i class="minimize" data-feather="minimize"></i>
                    </a>
                </li>


 <li class="nav-item dropdown">
                    <a href="{{ route('clear.cache') }}" class="nav-link" >
                        @lang('site.clear_cache')
                    </a>
                </li>

  

                <!-- end::header fullscreen -->


                {{--                <!-- begin::header notification dropdown -->--}}
                {{--                <li class="nav-item dropdown">--}}

                {{--                    <a href="#" class="nav-link nav-link-notify {{ count($announcement) < 1 ? 'hide-notif' : '' }}"--}}
                {{--                       title="Notifications" data-toggle="dropdown">--}}
                {{--                        <i data-feather="bell"></i>--}}
                {{--                    </a>--}}
                {{--                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-big">--}}
                {{--                        <div class="bg-dark p-4 text-center d-flex justify-content-between align-items-center">--}}
                {{--                            <h5 class="mb-0">@lang('site.announcement')</h5>--}}

                {{--                            <small class="opacity-7">{{ count($announcement) }} @lang('site.unread') </small>--}}
                {{--                        </div>--}}
                {{--                        <div>--}}
                {{--                            <ul class="list-group list-group-flush">--}}
                {{--                                @foreach($announcement as $anno)--}}
                {{--                                    <li>--}}
                {{--                                        <a href="{{ route('annonucements.show' , $anno->id) }}"--}}
                {{--                                           class="list-group-item d-flex align-items-center hide-show-toggler">--}}
                {{--                                            <div>--}}
                {{--                                                <figure class="avatar mr-2">--}}
                {{--                                                <span--}}
                {{--                                                    class="avatar-title bg-success-bright text-success rounded-circle">--}}
                {{--                                                    <i class="far fa-comment"></i>--}}
                {{--                                                </span>--}}
                {{--                                                </figure>--}}
                {{--                                            </div>--}}
                {{--                                            <div class="flex-grow-1">--}}
                {{--                                                <p class="mb-0 line-height-20 d-flex justify-content-between">--}}
                {{--                                                    {{ $anno->title }}--}}
                {{--                                                    <i title="Mark as read" data-toggle="tooltip"--}}
                {{--                                                       class="hide-show-toggler-item fa fa-circle-o font-size-11"></i>--}}
                {{--                                                </p>--}}
                {{--                                                <span class="text-muted small"> {{ $anno->created_at }} </span>--}}
                {{--                                            </div>--}}
                {{--                                        </a>--}}
                {{--                                    </li>--}}
                {{--                                @endforeach--}}

                {{--                            </ul>--}}
                {{--                        </div>--}}
                {{--                        <div class="p-2 text-right border-top">--}}
                {{--                            <ul class="list-inline small">--}}
                {{--                                <li class="list-inline-item mb-0">--}}
                {{--                                    <a href="#">@lang('site.new_announce')</a>--}}
                {{--                                </li>--}}
                {{--                            </ul>--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
                {{--                </li>--}}


                <li class="nav-item dropdown">
                    <a href="{{ url()->previous() }}" class="nav-link">
                        <i class="far fa-chevron-circle-left"></i>
                    </a>

                </li>






                <li class="nav-item dropdown">
                    <a href="{{ route('admin.panel') }}" class="nav-link">
                        <i class="far fa-home"></i>
                    </a>

                </li>


                <!-- begin::user menu -->
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link" title="User menu" data-sidebar-target="#user-menu">
                        <span class="mr-2 d-sm-inline d-none">
                            {{ auth()->user()->name }}
                        </span>
                        <figure class="avatar avatar-sm">
                            @if(isset(auth()->user()->avatar) && !empty(auth()->user()->avatar))
                                <img src="{{ Storage::url(auth()->user()->avatar) }}"
                                     class="rounded-circle"
                                     alt="...">
                            @else
                                <img src="{{ url('admin-theme') }}/assets/media/image/user/women_avatar1.jpg"
                                     class="rounded-circle"
                                     alt="...">
                            @endif
                        </figure>
                    </a>
                </li>
                <!-- end::user menu -->

            </ul>

            <!-- begin::mobile header toggler -->
            <ul class="navbar-nav d-flex align-items-center">
                <li class="nav-item header-toggler">
                    <a href="#" class="nav-link">
                        <i data-feather="arrow-down"></i>
                    </a>
                </li>
            </ul>
            <!-- end::mobile header toggler -->
        </div>
    </div>

</div>
<!-- end::header -->
