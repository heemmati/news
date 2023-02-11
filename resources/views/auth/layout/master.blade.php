<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"
          name="viewport">
    <meta content="ie=edge" http-equiv="X-UA-Compatible">

    {!! SEO::generate() !!}
    <script src="{{ url('site-theme') }}/js/vendor/jquery-1.12.1.min.js"></script>
    <!-- Bootstrap framework js -->
    <script src="{{ url('site-theme') }}/js/bootstrap.min.js"></script>

    @if(isset($main_setting) && !empty($main_setting))
    <link rel="icon" href="{{ \Illuminate\Support\Facades\Storage::url($main_setting->getItem('favicon')->image) }}"
    type="image/png">
    @endif

    <link rel="stylesheet" href="{{ url('site-theme') }}/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="{{ url('site-theme') }}/style.css"/>
    <link rel="stylesheet" href="{{ url('site-theme') }}/css/login.css"/>






</head>
<body>

@yield('content')


<!-- JavaScripts placed at the end of the document so the pages load faster -->
<script src="{{ url('site-theme') }}/js/vendor/jquery-1.12.1.min.js"></script>
<!-- Bootstrap framework js -->
<script src="{{ url('site-theme') }}/js/bootstrap.min.js"></script>
@yield('scripts')

@include('sweetalert::alert')



</body>
</html>
