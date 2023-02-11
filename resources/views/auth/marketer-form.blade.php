<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ثبت نام - فروشگاه دیجی آفاق</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="../../assets/media/image/favicon.png"/>

    <!-- Plugin styles -->
    <link rel="stylesheet" href="{{ url('admin-theme') }}/vendors/bundle.css" type="text/css">

    <!-- App styles -->
    <link rel="stylesheet" href="{{ url('admin-theme') }}/assets/css/app.min.css" type="text/css">
    <link rel="stylesheet" href="{{ url('admin-theme') }}/assets/css/hemmat.css" type="text/css">
</head>
<body class="form-membership">

<!-- begin::preloader-->
<div class="preloader">
    <div class="preloader-icon"></div>
</div>
<!-- end::preloader -->

<div class="form-wrapper">




    <h5>ساخت حساب کاربری</h5>

    <!-- form -->
    <form class="verfication_code" method="POST" action="{{ route('auth.register.verify') }}">
        @csrf
        <div class="form-group">
            <input type="number" name="verify_code" class="form-control" placeholder="کد ارسالی را وارد کنید" required>
        </div>


        <button class="btn btn-primary btn-block">ارسال</button>
        <hr>
        <p class="text-muted">آیا دارای اکانت هستید؟</p>
        <a href="{{ route('login') }}" class="btn btn-outline-light btn-sm">وارد شوید!</a>
    </form>
    <!-- ./ form -->


</div>

<!-- Plugin scripts -->
<script src="{{ url('admin-theme') }}/vendors/bundle.js"></script>
<!-- App scripts -->
<script src="{{ url('admin-theme') }}/assets/js/app.min.js"></script>


</body>
</html>
