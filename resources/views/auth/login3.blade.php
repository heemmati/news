@extends('auth.layout.master')

@section('content')

    <div class="container digi_login_container">

        <div class="row">
            <div class="form-container">
                <div class="box-bg">
                    <div class="row">
                        <div class="col-lg-12 pl-lg-0 my-3 login-container" >
                            <div id="login-form" >


                                    <form method="POST" class="m-md-2 mt-md-4 mt-4" action="{{ route('login') }}">

                                        <div class="logo-login">
                                            @if(isset($general['logo']) && !empty($general['logo']))
                                            <a href="{{ url('/') }}">
                                                <img width="100px"
                                                     src="{{ \Illuminate\Support\Facades\Storage::url($general['logo']->print) }}"
                                                     alt="{{ $general['logo']->print }}">
                                            </a>
                                        @endif
                                        </div>

                                        <h5>@lang('site.account_sign_in')</h5>

                                        @include('error.forms')

                                        @csrf
                                    <div class="form-group sign-in">
                                        <label for="enterance" class="label-form mt-0"> @lang('site.enterance') </label>
                                        <input type="text" name="enterance" value="{{ old('enterance') }}" id="enterance" class="form-control" placeholder="@lang('site.enter_enterance')" required>

                                        <label for="password" class="label-form">@lang('site.password')</label>
                                        <div class="pass-pos">
                                            <input type="password" name="password" id="password" class="form-control mb-0" placeholder="@lang('site.enter_password')" required>
                                            <p class="forgotten-pass"><a href="{{ route('auth.password.reset') }}">@lang('site.forget_your_password')</a></p>

                                        </div>
                                        <div class="remember-user">
                                            <label class="check-container" >
                                                <input type="checkbox" name="" id="checkbox" class="d-inline-block">
                                                <span class="checkmark"></span>
                                                <label for="checkbox" class="d-inline-block">
                                                @lang('site.reminde_me')
                                                </label>
                                            </label>
                                        </div>


                                        <br>

                                        <button class="btn btn-success form-submit box-btn">@lang('site.account_sign_in')</button>

                                        <a href="{{ route('auth.google') }}" style="margin-top: 20px;" class="btn btn-lg btn-success btn-block">
                                            <strong>Login With Google</strong>
                                        </a>


                                        <p class="sign-up-txt">@lang('site.dont_account')<a href="{{ route('register') }}">@lang('site.register_now')</a></p>
                                    </div>


                                </form>
                            </div>

                        </div>


                    </div>


                </div>
            </div>
        </div>
    </div>



@endsection

@section('scripts')
    // <script type="text/javascript">
    //     $('#reload').click(function () {
    //         $.ajax({
    //             type: 'GET',
    //             url: '{{ route('captcha.reload') }}',
    //             success: function (data) {
    //                 $(".captcha span").html(data.captcha);
    //             }
    //         });
    //     });

    // </script>
@endsection
