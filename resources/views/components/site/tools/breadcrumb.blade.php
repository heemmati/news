<div class="site-breadcrumb" style="background: url({{ url('site-theme') }}/assets/img/breadcrumb/breadcrumb.jpg)">
    <div class="container">
        <h1 class="breadcrumb-title">{{ $title }}</h1>
        <ul class="breadcrumb-menu clearfix">
            <li><a href="{{ url('/') }}">صفحه اصلی</a></li>
            <li class="active">{{ $title  }}</li>
        </ul>
    </div>
</div>
