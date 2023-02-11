<!-- BEGIN: Sidebar Group -->
<div class="sidebar-group">

    <!-- BEGIN: User Menu -->
    <div class="sidebar" id="user-menu">
        <div class="py-4 text-center" data-backround-image="{{ Url('admin-theme') }}/assets/media/image/image1.jpg">
            <figure class="avatar avatar-lg mb-3 border-0">
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
            <h5 class="d-flex align-items-center justify-content-center">
                {{ auth()->user()->name }}
            </h5>
            <div>
                {{ \App\Utility\Acl::getRole(auth()->user()->role) }}
            </div>
        </div>
        <div class="card mb-0 card-body shadow-none">
            <div class="mb-4">
                <div class="list-group list-group-flush">
                    @can('users.show')
                        <a href="{{ route('users.show' , auth()->id()) }}" class="list-group-item p-l-r-0">@lang('site.profile')</a>
                    @endcan
                    @can('users.change-password')
                        <a href="{{ route('users.change-password' , auth()->id() ) }}"
                           class="list-group-item p-l-r-0 d-flex">@lang('site.change_pass')</a>
                    @endcan
                    @can('users.edit')
                        <a href="{{ route('users.edit' , auth()->id() ) }}" class="list-group-item p-l-r-0">
                            @lang('site.edit_profile')
                        </a>
                    @endcan

                    <a href="{{ route('auth.logout') }}" class="list-group-item p-l-r-0"> @lang('site.exit') </a>


                </div>
            </div>

        </div>
    </div>
    <!-- END: User Menu -->

    <!-- BEGIN: Settings -->
    <div class="sidebar" id="settings">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">Settings</h6>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item pl-0 pr-0">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="customSwitch1" checked>
                            <label class="custom-control-label" for="customSwitch1">Allow notifications.</label>
                        </div>
                    </li>
                    <li class="list-group-item pl-0 pr-0">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="customSwitch2">
                            <label class="custom-control-label" for="customSwitch2">Hide user requests</label>
                        </div>
                    </li>
                    <li class="list-group-item pl-0 pr-0">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="customSwitch3" checked>
                            <label class="custom-control-label" for="customSwitch3">Speed up demands</label>
                        </div>
                    </li>
                    <li class="list-group-item pl-0 pr-0">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="customSwitch4" checked>
                            <label class="custom-control-label" for="customSwitch4">Hide menus</label>
                        </div>
                    </li>
                    <li class="list-group-item pl-0 pr-0">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="customSwitch5">
                            <label class="custom-control-label" for="customSwitch5">Remember next visits</label>
                        </div>
                    </li>
                    <li class="list-group-item pl-0 pr-0">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="customSwitch6">
                            <label class="custom-control-label" for="customSwitch6">Enable report
                                generation.</label>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- END: Settings -->

</div>
<!-- END: Sidebar Group -->
