@extends ('admin.layout.master')


@section('content')
    <div class="content">


        <div class="page-header">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.panel') }}">@lang('site.dashboard')</a>
                    </li>

                    <li class="breadcrumb-item">
                        <a href="">@lang('site.create_user')</a>
                    </li>


                </ol>
            </nav>
        </div>


        <div class="row">
            <div class="col-md-12">


                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title"> @lang('site.create_user') </h6>

                        <!-- form -->
                        <form method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="row">

                                <div class="col-12 col-md-6">

                                    <x-form.text type="کاربر" name="name" namefa="{{ __('site.name_and_lastname') }}" :value="old('name')"  require="1"></x-form.text>


                                </div>

                                <div class="col-12 col-md-6">

                                    <x-form.text type="کاربر" name="username" namefa="{{ __('site.username_name') }}" :value="old('username')"   require="0"></x-form.text>


                                </div>



                            </div>

                            <div class="row">
                                <div class="col-12 col-md-6">

                                    <x-form.text type="کاربر"  kind="password" name="password" namefa="{{ __('site.password') }}" require="1"></x-form.text>

                                </div>

                                <div class="col-12 col-md-6">

                                    <x-form.text type="کاربر"   kind="password"  name="password_confirmation" namefa="{{ __('site.password_confirmation') }}" require="1"></x-form.text>

                                </div>


                            </div>



                            <div class="row">
                                <div class="col-12 col-md-6">

                                    <x-form.text type="کاربر" :value="old('mobile')"  name="mobile" namefa="{{ __('site.mobile_phone') }}" require="1"></x-form.text>

                                </div>

                                <div class="col-12 col-md-6">

                                    <x-form.text type="کاربر" :value="old('email')"  name="email" namefa="{{ __('site.email') }}" require="1"></x-form.text>

                                </div>




                                <div class="col-12 col-md-6">

                                    <x-form.utility  type="کاربر"   :items="\App\Utility\Acl::getRoles()" name="role" namefa="{{ __('site.posts') }}" require="1"></x-form.utility>

                                </div>

                                <div class="col-12 col-md-6">

                                    <x-form.select  type="کاربر"  :value="old('role')" :items="$roles" name="roles" namefa="{{ __('site.roles') }}" require="1" multiple="1"></x-form.select>

                                </div>

                            </div>




                            <div class="row">
                                <div class="col-12 col-md-12">
                                    <x-form.filemanager.image name="avatar" :value="old('avatar')" namefa="{{ __('site.profile_image') }}" ></x-form.filemanager.image>
                                                    </div>
                            </div>


                            @include('module.user.partials.create')


                            <button class="btn btn-primary">@lang('site.create_users')</button>

                        </form>
                        <!-- ./ form -->
                    </div>
                </div>


            </div>
        </div>


    </div>
@endsection
