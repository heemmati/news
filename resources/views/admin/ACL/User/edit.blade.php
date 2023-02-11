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
                        <a href="">@lang('site.edit_user')</a>
                    </li>


                </ol>
            </nav>
        </div>


        <div class="row">
            <div class="col-md-12">


                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">@lang('site.edit_user') </h6>

                    <!-- form -->
                        <form method="POST" action="{{ route('users.update' , $user->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')

                            <div class="row">

                                <div class="col-12 col-md-6">
                                    <div class="form-group">

                                            <label for="">@lang('site.name_and_lastname')</label>
                                            <input type="text" name="name" class="form-control" value="{{ $user->name }}"
                                                   placeholder="@lang('site.name_and_lastname')" required>
                                            <small>
                                                @lang('site.name_and_lastname')
                                            </small>

                                    </div>
                                </div>

                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label for="">@lang('site.username_name')</label>
                                        <input type="text" name="username" class="form-control"
                                               value="{{ $user->username }}"
                                               placeholder="@lang('site.username_name')"
                                               required>
                                        <small>
                                            @lang('site.username_name')
                                        </small>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label for="">@lang('site.mobile_phone')</label>
                                        <input type="text" name="mobile" class="form-control" value="{{ $user->mobile }}"
                                               placeholder="@lang('site.mobile_phone')" required>
                                        <small>

                                            @lang('site.mobile_phone')                                        </small>
                                    </div>
                                </div>


    <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label for="">@lang('site.email')</label>
                                        <input type="email" name="email" class="form-control" value="{{ $user->email }}"
                                               placeholder="@lang('site.email')" required>
                                        <small>

                                            @lang('site.email')                                        </small>
                                    </div>
                                </div>
                            </div>




                            <div class="row">
                                <div class="col-12 col-md-12">
                                    <x-form.filemanager.image  name="avatar" namefa="{{ __('site.profile_image') }}" :value="$user->avatar" ></x-form.filemanager.image>
                                </div>
                            </div>


@if(isset($user->details) && !empty($user->details))
<div class="row">
    <div class="col-6 col-md-4">
        <x-form.text type="کاربر" name="melli_code" namefa="کد ملی" require="0" :value="$user->details->melli_code"></x-form.text>
    </div>

    <div class="col-6 col-md-4">
        <x-form.text type="کاربر" name="phone" namefa="شماره تماس" require="0" :value="$user->details->phone"></x-form.text>
    </div>

    <div class="col-6 col-md-4">
        <x-form.text type="کاربر" name="birth_date" kind="date" namefa="تاریخ تولد" require="0" :value="$user->details->birth_date"></x-form.text>
    </div>

    <div class="col-6 col-md-12">
        <x-form.textarea type="کاربر" name="bio" namefa="بیوگرافی" require="0" :value="$user->details->bio"></x-form.textarea>
    </div>

    <div class="col-6 col-md-12">
        <x-form.textarea type="کاربر" name="address" namefa="آدرس" require="0" :value="$user->details->address"></x-form.textarea>
    </div>

</div>

@else

<div class="row">
    <div class="col-6 col-md-4">
        <x-form.text type="کاربر" name="melli_code" namefa="کد ملی" require="0" ></x-form.text>
    </div>

    <div class="col-6 col-md-4">
        <x-form.text type="کاربر" name="phone" namefa="شماره تماس" require="0" ></x-form.text>
    </div>

    <div class="col-6 col-md-4">
        <x-form.text type="کاربر" name="birth_date" kind="date" namefa="تاریخ تولد" require="0" ></x-form.text>
    </div>

    <div class="col-6 col-md-12">
        <x-form.textarea type="کاربر" name="bio" namefa="بیوگرافی" require="0"></x-form.textarea>
    </div>

    <div class="col-6 col-md-12">
        <x-form.textarea type="کاربر" name="address" namefa="آدرس" require="0" ></x-form.textarea>
    </div>
@endif






                            <button class="btn btn-primary">@lang('site.edit_profile')</button>

                        </form>
                        <!-- ./ form -->
                    </div>
                </div>


            </div>
        </div>


    </div>
@endsection


@section('scripts')
    <script>
        var purpose;
        $(document).on('click', '.button-image', function () {
            window.open('/file-manager/fm-button', 'fm', 'width=1400,height=800');
            purpose = $(this);
        });

        // set file link
        function fmSetLink($url) {
            purpose.parent().parent().find('.image_label').val($url);
        }

    </script>
@endsection


