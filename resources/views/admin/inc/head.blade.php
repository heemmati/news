<!doctype html>
<html lang="fa">


<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@lang('site.site_name')</title>
    @ischeck($logo)
    <link rel="icon" href="{{ \Illuminate\Support\Facades\Storage::url($logo->print) }}" type="image/png">
    @endischeck
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!--<script src="https://ckeditor.com/apps/ckfinder/3.5.0/ckfinder.js"></script>-->


{{--    <!-- Favicon -->--}}
{{--    <link rel="shortcut icon" href="{{ Url('admin-theme') }}/assets/media/image/favicon.png"/>--}}

    <!-- Plugin styles -->
    <!--<link rel="stylesheet" href="{{ Url('admin-theme') }}/vendors/bundle.css" type="text/css">-->

    <!-- Slick -->
    <link rel="stylesheet" href="{{ Url('admin-theme') }}/vendors/slick/slick.css" type="text/css">
    <link rel="stylesheet" href="{{ Url('admin-theme') }}/vendors/slick/slick-theme.css" type="text/css">

    <!-- Daterangepicker -->
    <link rel="stylesheet" href="{{ Url('admin-theme') }}/vendors/datepicker/daterangepicker.css" type="text/css">

    <!-- DataTable -->
    <link rel="stylesheet" href="{{ Url('admin-theme') }}/vendors/dataTable/datatables.min.css" type="text/css">

    <link rel="stylesheet" href="{{ url('vendor/file-manager/css/file-manager.css') }}">


                <link
            rel="stylesheet"
            href="{{ url('admin-theme') }}/css/bootstrap.min.css"
          >
        <link rel="stylesheet" href="{{ Url('admin-theme') }}/assets/css/rtl.css" type="text/css">
        <!-- App styles -->



    <link rel="stylesheet" href="{{ Url('admin-theme') }}/vendors/prism/prism.css" type="text/css">

    <link rel="stylesheet" href="{{ Url('admin-theme') }}/vendors/form-wizard/jquery.steps.css" type="text/css">
    <link rel="stylesheet" href="{{ Url('admin-theme') }}/assets/css/hemmat.css" type="text/css">
    <link rel="stylesheet" href="{{ Url('admin-theme') }}/assets/css/themify-icons.css" type="text/css">
    <link rel="stylesheet" href="{{ Url('admin-theme') }}/assets/css/kamadatepicker.min.css" type="text/css">
    <!-- Style -->
    <link rel="stylesheet" href="{{ Url('admin-theme') }}/vendors/select2/css/select2.min.css" type="text/css">

    <!-- Style -->
    <link rel="stylesheet" href="{{ Url('admin-theme') }}/vendors/charts/morsis/morris.css" type="text/css">


    <!-- Javascript -->

    <link rel="stylesheet" href="{{ Url('admin-theme') }}/vendors/tagsinput/bootstrap-tagsinput.css" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="{{ Url('admin-theme') }}/assets/js/leaflet.css" type="text/css">


</head>
<body class="">
