<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    @if(config('app.locale') == \App\Utility\Lang::PERSIAN)
        <link rel="stylesheet" href="{{ url('admin-theme') }}/assets/css/rtl.css" type="text/css">
@endif


    <link rel="stylesheet" href="{{ Url('admin-theme') }}/assets/js/leaflet.css" type="text/css">
    <!-- Plugin styles -->
    <link rel="stylesheet" href="{{ url('admin-theme') }}/vendors/bundle.css" type="text/css">

    <!-- App styles -->
    <link rel="stylesheet" href="{{ url('admin-theme') }}/assets/css/app.min.css" type="text/css">
    <link rel="stylesheet" href="{{ url('admin-theme') }}/assets/css/hemmat.css" type="text/css">


</head>
<body class="form-membership">


@yield('content')


<!-- Plugin scripts -->
<script src="{{ url('admin-theme') }}/vendors/bundle.js"></script>
<!-- App scripts -->
<script src="{{ url('admin-theme') }}/assets/js/app.min.js"></script>

@yield('scripts')

</body>
</html>
