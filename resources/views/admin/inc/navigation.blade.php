<!-- begin::navigation -->

<div class="navigation">
    <div class="navigation-menu-tab">
        <ul>
            <li>
                <a href="#" data-toggle="tooltip" data-placement="right" title="@lang('site.dashboard')"
                   data-nav-target="#analytics">
                    <i data-feather="activity"></i>
                </a>
            </li>

            {{-- Content Links--}}


            <li>
                <a href="#" data-toggle="tooltip"
                   data-placement="right" title="@lang('site.content_management')"
                   data-nav-target="#forms">
                    <i data-feather="edit-3"></i>
                </a>
            </li>


            <li>
                <a href="#" data-toggle="media"
                   data-placement="right" title="{{ __('site.multimedia') }}"
                   data-nav-target="#media">
                    <i data-feather="hard-drive"></i>
                </a>
            </li>


            <li>
                <a href="#" data-toggle="tooltip"
                   data-placement="right" title="@lang('site.my_panel')"
                   data-nav-target="#mypanel">
                    <i data-feather="check-circle"></i>
                </a>
            </li>


            {{-- User Management Links--}}
            <li>
                <a href="#" data-toggle="tooltip" data-placement="right" title="@lang('site.users_management')"
                   data-nav-target="#user">
                    <i data-feather="users"></i>
                </a>
            </li>


            {{-- Site Setting Links --}}
            <li>
                <a href="#" data-toggle="tooltip"
                   data-placement="right" title="@lang('site.setting')"
                   data-nav-target="#components">
                    <i data-feather="settings"></i>
                </a>
            </li>


            <li>
                <a href="#" data-toggle="tooltip" data-placement="right" title="@lang('site.languages_setting')"
                   data-nav-target="#languages">
                    <i data-feather="globe"></i>

                </a>
            </li>


            <li>
                <a href="#" data-toggle="tooltip" data-placement="right" title="{{ __('site.connect_to_customer') }}"
                   data-nav-target="#send">
                    <i data-feather="send"></i>

                </a>
            </li>

            <li>
                <a href="#" data-toggle="tooltip" data-placement="right" title="{{ __('site.help_center') }}"
                   data-nav-target="#helpers">
                    <i data-feather="help-circle"></i>

                </a>
            </li>

        </ul>
    </div>
    <div class="navigation-menu-body">
        <div class="navigation-menu-group">

            {{-- First Tab   Dashboard Staffs --}}
            <div id="analytics">
                <ul>
                    <li class="navigation-divider d-flex align-items-center">
                        <i class="mr-2" data-feather="activity"></i>
                        @lang('site.dashboard')
                    </li>

                    @can('admin.panel')
                        <li>
                            <a href="{{ route('admin.panel') }}"> @lang('site.dashboard')</a></li>
                    @endcan

                    @can('users.show')
                        <li>

                            <a href="{{ route('users.show' , auth()->id()) }}"> @lang('site.profile')</a></li>
                    @endcan

                    @can('users.change-password')
                        <li>

                            <a href="{{ route('users.change-password' , auth()->id()) }}"> @lang('site.change_pass')</a>
                        </li>
                    @endcan

                    {{  \App\Lubricator\PanelLuber::getListMenu('analytics' ,  __('site.dashboard') , 'activity' )   }}

                    <li>

                        <a href="{{ route('auth.logout') }}">@lang('site.exit')</a></li>

                </ul>
            </div>
            {{-- First Tab   Dashboard Staffs --}}


            {{-- Panel Luberin Menu Geenerating --}}
            {{  \App\Lubricator\PanelLuber::getListMenu('mypanel' , __('site.my_panel') , 'check-circle' , 1)   }}
            {{  \App\Lubricator\PanelLuber::getListMenu('user' , __('site.user_management') , 'users' , 1)   }}
            {{ \App\Lubricator\PanelLuber::getListMenu('forms' , __('site.content_management') , 'edit-3' , 1) }}
            {{  \App\Lubricator\PanelLuber::getListMenu('send' , __('site.customer_connection') , 'send' , 1) }}
            {{  \App\Lubricator\PanelLuber::getListMenu('components' , __('site.setting') , 'layers' , 1)  }}
            {{  \App\Lubricator\PanelLuber::getListMenu('languages' , __('site.setting') , 'globe' , 1)  }}
            {{-- Panel Luberin Menu Geenerating --}}




            {{-- Customize and File manager Menus --}}
            <div id="media">
                <ul>
                    <li class="navigation-divider d-flex align-items-center">
                        <i class="mr-2" data-feather="hard-drive"></i>
                    </li>

                    @can('images.index')
                        <li>
                            <a href="{{ route('images.index') }}">
                                @lang('site.image_management')
                            </a>
                        </li>
                    @endcan

                    @can('podcasts.index')
                        <li>
                            <a href="{{ route('podcasts.index') }}">
                                @lang('site.podcast_management')
                            </a>
                        </li>
                    @endcan


                    <li>
                        <a href="{{ route('videos.index') }}">
                            @lang('site.video_management')
                        </a>
                    </li>


                    <li>
                        <a href="{{ route('files.index') }}">
                            @lang('site.file_management')
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('icons.index') }}">
                            @lang('site.icon_management')
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('galleries.index') }}">
                            @lang('site.gallery_management')
                        </a>
                    </li>


                    <li>
                        <a href="{{ route('comments.index') }}">
                            @lang('site.comment_management')
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('likes.index') }}">
                            @lang('site.like_management')
                        </a>
                    </li>


                    <li>
                        <a href="{{ route('ratings.index') }}">
                            @lang('site.star_management')
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('bookmarks.index') }}">
                            @lang('site.bookmark_management')
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('translates.group.edit') }}">
                            @lang('site.translates_group_edit')
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('words.group.create') }}">
                            @lang('site.words_group_create')
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('general-items.bunch.create') }}">
                            @lang('site.create_many_setting')
                        </a>
                    </li>




                </ul>
            </div>
            {{-- Customize and File manager Menus --}}



            {{-- Panel Helpers --}}
            <div id="helpers">
                <ul>


                    {{--                        @php--}}
                    {{--                            $helps = \App\Model\Helper::where('status' , 1)->get();--}}
                    {{--                        @endphp--}}
                    {{--                        @foreach($helps as $help)--}}
                    {{--                            <li>--}}

                    {{--                                <a href="{{ url($help->path()) }}">--}}
                    {{--                                    {{ $help->title }}--}}


                    {{--                                </a>--}}


                    {{--                            </li>--}}
                    {{--                        @endforeach--}}


                </ul>
            </div>
            {{-- Panel Helpers --}}

        </div>
    </div>
</div>
<!-- end::navigation -->
