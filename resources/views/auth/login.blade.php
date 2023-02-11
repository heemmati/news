<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> DIGI AFAGH </title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="../../assets/media/image/favicon.png"/>

    <!-- Plugin styles -->
    <link rel="stylesheet" href="{{ url('admin-theme') }}/vendors/bundle.css" type="text/css">

    <!-- App styles -->
    <link rel="stylesheet" href="{{ url('admin-theme') }}/assets/css/app.min.css" type="text/css">
    <link rel="stylesheet" href="{{ url('admin-theme') }}/assets/css/hemmat.css" type="text/css">
</head>
<body class="form-membership">


<div class="form-wrapper">


    <!-- form -->
    <form method="POST" action="{{ route('login') }}">

        @include('error.forms')

        @csrf


        <div class="form-group">
            <input type="email" name="email" value="{{ old('email') }}" class="form-control"
                   placeholder=" @lang('site.enter_email')" required autofocus>
        </div>
        <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="@lang('site.enter_password')"
                   required>
        </div>
        <div class="form-group d-flex justify-content-between">

            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}">
                    @lang('site.forget_your_password')
                </a>
            @endif
        </div>
        <a href="{{ route('auth.password.reset') }}">رمز عبور خود را فراموش کرده اید؟

        </a>
        <button type="submit" class="btn btn-primary btn-block">@lang('site.login')</button>
        <hr>
        <p class="text-muted">
            @lang('site.dont_account')
        </p>
        <a href="{{ route('register') }}" class="btn btn-outline-light btn-sm">
            @lang('site.register_now')
        </a>
    </form>
    <!-- ./ form -->


</div>

<!-- Plugin scripts -->
<script src="{{ url('admin-theme') }}/vendors/bundle.js"></script>

<!-- App scripts -->
<script src="{{ url('admin-theme') }}/assets/js/app.min.js"></script>
</body>

</html>



