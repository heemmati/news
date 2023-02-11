@extends ('admin.layout.master')

@section('content')
    <div class="content-body">

        <div class="content">


            <div class="page-header">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="/">@lang('site.site_name')</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">@lang('site.dashboard')</li>
                    </ol>
                </nav>
            </div>


            <div class="row">
                <div class="col-md-12">

                    <div class="row">
                        @if(isset($counts['article_count']) && !empty($counts['article_count']))
                            <div class="col-lg-3 col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between mb-3">
                                            <div>
                                                <p class="text-muted">
                                                    <a href="{{ route('articles.index') }}">
                                                        تعداد مقالات
                                                    </a>
                                                </p>
                                                <h2 class="font-weight-bold">{{ $counts['article_count'] }}</h2>
                                            </div>
                                            <div>
                                                <figure class="avatar">
                                        <span class="avatar-title bg-success-bright text-success rounded-circle">
                                            <i class="ti-bookmark-alt"></i>
                                        </span>
                                                </figure>
                                            </div>


                                        </div>
                                        <a class="d-block btn btn-sm btn-gradient-dark" href="{{ route('articles.create') }}">
                                            ایجاد مقاله جدید

                                            <i class="ti-plus"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if(isset($counts['portofolio_count']) && !empty($counts['portofolio_count']))

                            <div class="col-lg-3 col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between mb-3">
                                            <div>
                                                <p class="text-muted">
                                                    <a href="{{ route('portofolios.index') }}">
                                                            تعداد نمونه کار ها
                                                    </a>
                                                </p>
                                                <h2 class="font-weight-bold">{{ $counts['portofolio_count']  }}</h2>
                                            </div>
                                            <div>
                                                <figure class="avatar">
                                        <span class="avatar-title bg-info-bright text-info rounded-circle">
                                            <i class="ti-desktop"></i>
                                        </span>
                                                </figure>
                                            </div>
                                        </div>

                                        <a class="d-block btn btn-sm btn-gradient-dark" href="{{ route('portofolios.create') }}">
                                            ایجاد نمونه کار جدید

                                            <i class="ti-plus"></i>
                                        </a>

                                    </div>


                                </div>
                            </div>
                        @endif

                            @if(isset($counts['service_count']) && !empty($counts['service_count']))

                                <div class="col-lg-3 col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between mb-3">
                                                <div>
                                                    <p class="text-muted">
                                                        <a href="{{ route('services.index') }}">
                                                            تعداد خدمات
                                                        </a>
                                                    </p>
                                                    <h2 class="font-weight-bold">{{ $counts['service_count']  }}</h2>
                                                </div>
                                                <div>
                                                    <figure class="avatar">
                                        <span class="avatar-title bg-info-bright text-info rounded-circle">
                                            <i class="ti-server"></i>
                                        </span>
                                                    </figure>
                                                </div>
                                            </div>

                                            <a class="d-block btn btn-sm btn-gradient-dark" href="{{ route('services.create') }}">
                                                ایجاد خدمات جدید

                                                <i class="ti-plus"></i>
                                            </a>

                                        </div>
                                    </div>
                                </div>
                            @endif


                        @if(isset($counts['sale_count']) && !empty($counts['sale_count']))

                            <div class="col-lg-3 col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between mb-3">
                                            <div>
                                                <p class="text-muted">
                                                    <a href="{{ route('sales.index') }}">
                                                        تعداد موارد فروش
                                                    </a>
                                                </p>
                                                <h2 class="font-weight-bold">{{ $counts['sale_count'] }}</h2>
                                            </div>
                                            <div>
                                                <figure class="avatar">
                                        <span class="avatar-title bg-warning-bright text-warning rounded-circle">
                                            <i class="ti-money"></i>
                                        </span>
                                                </figure>
                                            </div>
                                        </div>
                                        <a class="d-block btn btn-sm btn-gradient-dark" href="{{ route('sales.create') }}">
                                            ایجاد مورد فروش جدید

                                            <i class="ti-plus"></i>
                                        </a>

                                    </div>



                                </div>
                            </div>
                        @endif
                        @if(isset($counts['page_count']) && !empty($counts['page_count']))

                            <div class="col-lg-3 col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between mb-3">
                                            <div>
                                                <p class="text-muted">
                                                    <a href="{{ route('pages.index') }}">
                                                        تعداد برگه ها
                                                    </a>
                                                </p>
                                                <h2 class="font-weight-bold">{{ $counts['page_count'] }}</h2>
                                            </div>
                                            <div>
                                                <figure class="avatar">
                                        <span class="avatar-title bg-warning-bright text-warning rounded-circle">
                                            <i class="ti-layers-alt"></i>
                                        </span>
                                                </figure>
                                            </div>
                                        </div>

                                        <a class="d-block btn btn-sm btn-gradient-dark" href="{{ route('pages.create') }}">
                                            ایجاد برگه جدید

                                            <i class="ti-plus"></i>
                                        </a>

                                    </div>
                                </div>
                            </div>
                        @endif
                        @if(isset($counts['tag_count']) && !empty($counts['tag_count']))

                            <div class="col-lg-3 col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between mb-3">
                                            <div>
                                                <p class="text-muted">
{{--                                                    <a href="{{ route('tags.index') }}">--}}
{{--                                                        تعداد تگ ها--}}
{{--                                                    </a>--}}

                                                    تعداد تگ ها
                                                </p>
                                                <h2 class="font-weight-bold">{{ $counts['tag_count'] }}</h2>
                                            </div>
                                            <div>
                                                <figure class="avatar">
                                        <span class="avatar-title bg-secondary-bright text-success rounded-circle">
                                            <i class="ti-tag"></i>
                                        </span>
                                                </figure>
                                            </div>
                                        </div>
                                        <a class="d-block btn btn-sm btn-gradient-dark" href="">
                                            ایجاد تگ  جدید

                                            <i class="ti-plus"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if(isset($counts['pcategory_count']) && !empty($counts['pcategory_count']))

                            <div class="col-lg-3 col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between mb-3">
                                            <div>
                                                <p class="text-muted">
                                                    <a href="{{ route('article-categories.index') }}">
                                                        تعداد دسته بندی نمونه کار ها
                                                    </a>
                                                </p>
                                                <h2 class="font-weight-bold">{{ $counts['pcategory_count'] }}</h2>
                                            </div>
                                            <div>
                                                <figure class="avatar">
                                        <span class="avatar-title bg-secondary-bright text-danger rounded-circle">
                                            <i class="ti-package"></i>
                                        </span>
                                                </figure>
                                            </div>
                                        </div>

                                                                                <a class="d-block btn btn-sm btn-gradient-dark" href="{{ route('portofolio-categories.create') }}">
                                                                                    ایجاد دسته بندی  جدید

                                                                                    <i class="ti-plus"></i>
                                                                                </a>

                                    </div>
                                </div>
                            </div>
                        @endif
                            @if(isset($counts['acategory_count']) && !empty($counts['acategory_count']))

                                <div class="col-lg-3 col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between mb-3">
                                                <div>
                                                    <p class="text-muted">
                                                        <a href="{{ route('article-categories.index') }}">
                                                            تعداد دسته بندی مقالات
                                                        </a>
                                                    </p>
                                                    <h2 class="font-weight-bold">{{ $counts['acategory_count'] }}</h2>
                                                </div>
                                                <div>
                                                    <figure class="avatar">
                                        <span class="avatar-title bg-secondary-bright text-secondary rounded-circle">
                                            <i class="ti-package"></i>
                                        </span>
                                                    </figure>
                                                </div>
                                            </div>

                                            <a class="d-block btn btn-sm btn-gradient-dark" href="{{ route('article-categories.create') }}">
                                                ایجاد دسته بندی  جدید

                                                <i class="ti-plus"></i>
                                            </a>

                                        </div>
                                    </div>
                                </div>
                            @endif
                    </div>

                </div>
            </div>


        </div>

        <!-- begin::footer -->
        <footer class="content-footer">
            @if(config('app.locale') == \App\Utility\Lang::PERSIAN)
                <div>© 2020 طراحی سایت و بهینه سازی -

                    <a href="http://inten.asia/" target="_blank">اینتن</a>

                </div>
            @else
                <div> Designed By :
                    <a href="http://inten.asia/" target="_blank"> Inten </a>
                </div>
            @endif

        </footer>
        <!-- end::footer -->

    </div>
@endsection


@section('scripts')
    <script>
        //jQuery time
        var current_fs, next_fs, previous_fs; //fieldsets
        var left, opacity, scale; //fieldset properties which we will animate
        var animating; //flag to prevent quick multi-click glitches

        $(".next").click(function () {
            if (animating) return false;
            animating = true;

            current_fs = $(this).parent();
            next_fs = $(this).parent().next();

            //activate next step on progressbar using the index of next_fs
            $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

            //show the next fieldset
            next_fs.show();
            //hide the current fieldset with style
            current_fs.animate({
                opacity: 0
            }, {
                step: function (now, mx) {
                    //as the opacity of current_fs reduces to 0 - stored in "now"
                    //1. scale current_fs down to 80%
                    scale = 1 - (1 - now) * 0.2;
                    //2. bring next_fs from the right(50%)
                    left = (now * 50) + "%";
                    //3. increase opacity of next_fs to 1 as it moves in
                    opacity = 1 - now;
                    current_fs.css({
                        'transform': 'scale(' + scale + ')'
                    });
                    next_fs.css({
                        'left': left,
                        'opacity': opacity
                    });
                },
                duration: 800,
                complete: function () {
                    current_fs.hide();
                    animating = false;
                },
                //this comes from the custom easing plugin
                easing: 'easeInOutBack'
            });
        });

        $(".previous").click(function () {
            if (animating) return false;
            animating = true;

            current_fs = $(this).parent();
            previous_fs = $(this).parent().prev();

            //de-activate current step on progressbar
            $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

            //show the previous fieldset
            previous_fs.show();
            //hide the current fieldset with style
            current_fs.animate({
                opacity: 0
            }, {
                step: function (now, mx) {
                    //as the opacity of current_fs reduces to 0 - stored in "now"
                    //1. scale previous_fs from 80% to 100%
                    scale = 0.8 + (1 - now) * 0.2;
                    //2. take current_fs to the right(50%) - from 0%
                    left = ((1 - now) * 50) + "%";
                    //3. increase opacity of previous_fs to 1 as it moves in
                    opacity = 1 - now;
                    current_fs.css({
                        'left': left
                    });
                    previous_fs.css({
                        'transform': 'scale(' + scale + ')',
                        'opacity': opacity
                    });
                },
                duration: 800,
                complete: function () {
                    current_fs.hide();
                    animating = false;
                },
                //this comes from the custom easing plugin
                easing: 'easeInOutBack'
            });
        });

        $(".submit").click(function () {
            return false;
        })
    </script>

@endsection
