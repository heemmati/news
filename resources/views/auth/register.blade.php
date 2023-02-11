
@extends('auth.layout.master')

@section('content')

    <div class="container digi_login_container">

        <div class="row">
            <div class="form-container">
                <div class="box-bg">
                    <div class="row">
                        <div class="col-lg-12 pl-lg-0 my-3 login-container" >
                            <div id="login-form" >


                                <form method="POST" class="m-md-2 mt-md-4 mt-4" action="{{ route('register') }}">
                                                                     @csrf

                                                                     <div class="logo-login">
                                                                        @if(isset($general['logo']) && !empty($general['logo']))
                                                                        <a href="{{ url('/') }}">
                                                                            <img width="100px"
                                                                                 src="{{ \Illuminate\Support\Facades\Storage::url($general['logo']->print) }}"
                                                                                 alt="{{ $general['logo']->print }}">
                                                                        </a>
                                                                    @endif
                                                                    </div>

                                                                    <h5>@lang('site.create_my_account')</h5>

                                        @include('error.forms')
                                    <div class="form-group sign-in">
                                        <label for="enterance" class="label-form mt-0"> @lang('site.enterance') </label>
                                        <input type="text" name="enterance" value="{{ old('enterance') }}" id="enterance" class="form-control" placeholder="@lang('site.enter_enterance')" required>

                                        <label for="password" class="label-form">@lang('site.password')</label>
                                        <div class="pass-pos">
                                            <input type="password" name="password" id="password" class="form-control mb-0" placeholder="@lang('site.enter_password')" required>



                                        </div>

                                        <div class="captcha">
                                            <span>{!! captcha_img() !!}</span>
                                            <button type="button" class="btn btn-danger" class="reload" id="reload">
                                                &#x21bb;
                                            </button>
                                        </div>

                                        <input id="captcha" type="text" class="form-control" placeholder="{{ __('site.enter_captcha') }}" name="captcha">

                                        <br>

                                        <button class="form-submit btn btn-success box-btn">@lang('site.create_my_account')</button>

                                        <p class="sign-up-txt">@lang('site.do_have_account')<a href="{{ route('login') }}">@lang('site.sign_in')</a></p>
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
    <script type="text/javascript">
        $('#reload').click(function () {

            $.ajax({
                type: 'GET',
                url: '{{ route('captcha.reload') }}',
                success: function (data) {
                    $(".captcha span").html(data.captcha);
                }
            });
        });

    </script>
    @endsection
