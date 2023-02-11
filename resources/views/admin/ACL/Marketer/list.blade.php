@extends ('admin.layout.master')


@section('content')
    <style>
        .tree, .tree ul, .tree li {
            list-style: none;
            margin: 0;
            padding: 0;
            position: relative;
        }

        .tree {
            margin: 0 0 1em;
            text-align: center;
            width: 100%;
        }

        .tree, .tree ul {
            display: table;
        }

        .tree ul {
            width: 100%;
        }

        .tree li {
            display: table-cell;
            padding: .5em 0;
            vertical-align: top;
        }

        /* _________ */
        .tree li:before {
            outline: solid 1px #666;
            content: "";
            left: 0;
            position: absolute;
            right: 0;
            top: 0;
        }
        @if(config('app.locale') == \App\Utility\Lang::PERSIAN)
        .tree li:first-child:before {
            right: 50%;
        }

        .tree li:last-child:before {
            left: 50%;
        }

        @else
          .tree li:first-child:before {
            left: 50%;
        }

        .tree li:last-child:before {
            right: 50%;
        }
        @endif
        .tree a, .tree span {
            border: solid .1em #666;
            border-radius: .2em;
            display: inline-block;
            margin: 0 .2em .5em;
            padding: .2em .5em;
            position: relative;
        }

        /* If the tree represents DOM structure */
        .tree a {
            font-family: monaco, Consolas, 'Lucida Console', monospace;
        }

        /* | */
        .tree ul:before,
        .tree a:before,
        .tree span:before {
            outline: solid 1px #666;
            content: "";
            height: .5em;
            right: 50%;
            position: absolute;
        }

        .tree ul:before {
            top: -.5em;
        }

        .tree a:before,
        .tree span:before {
            top: -.55em;
        }

        /* The root node doesn't connect upwards */
        .tree > li {
            margin-top: 0;
        }

        .tree > li:before,
        .tree > li:after,
        .tree > li > a:before,
        .tree > li > span:before {
            outline: none;
        }
    </style>
    <div class="content">


        <div class="page-header">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.panel') }}">داشبورد</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="">لیست بازاریابان زیر مجموعه </a>
                    </li>

                </ol>
            </nav>



        </div>


        <div class="row">
            <div class="col-md-12">

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                @if(isset($marketer) && !empty($marketer))
                                    <table id="example1" class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th>کد بازاریابی</th>
                                            <th>نام</th>
                                            <th>سمت</th>
                                            <th>نام بالا سری</th>
                                            <th>ایمیل</th>
                                            <th> موبایل</th>
                                            <th> امتیاز</th>
                                            <th>عملیات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                                    {!! $marketer !!}
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <th>کد بازاریابی</th>
                                            <th>نام</th>
                                            <th>سمت</th>
                                            <th>نام بالا سری</th>
                                            <th>ایمیل</th>
                                            <th> موبایل</th>
                                            <th> امتیاز</th>
                                            <th>عملیات</th>
                                        </tr>
                                        </tfoot>
                                    </table>
                                @else
                                    <div class="alert alert-secondary" role="alert">
                                        هیچ کاربری یافت نشد
                                    </div>
                                @endif
                            </div>

                            <div class="card-body">
                                <figure>
                                    <figcaption>لیست زیرمجموعه ها بصورت درختی</figcaption>
                                    <ul class="tree">

                                        <li>
                                            <a>شما</a>
                                            {!! $tree !!}
                                        </li>

                                    </ul>
                                </figure>


                            </div>

                        </div>



                        <div class="card">
                            <div class="card-body">
                                <div class="col-md-6">
                                    <div id="apex_chart_three" style="height: 300px"></div>
                                </div>
                                <div class="col-md-6">
                                    <div id="apex_chart_three2" style="height: 300px"></div>
                                </div>
                            </div>
                        </div>



                    </div>
                </div>

            </div>
        </div>


    </div>
    <!-- DataTable -->


@endsection
@section('scripts')
    <script>

        $(document).on('click' , '.sa-warning' , function () {

            Swal.fire({
                title: "@lang('site.delete_message')",
                text: "@lang('site.cant_return')",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "@lang('site.remove_it')",
                closeOnConfirm: false
            })
                .then((willDelete) => {
                    console.log(willDelete);
                    if (willDelete.value) {
                        $(this).siblings('form').submit();

                    }
                });
        });


    </script>

    <script>
        dates = [
            @foreach($dates as $date)
            '{{$date}}',

            @endforeach

        ];

        data = [
            @foreach($sub_sell as $item)
                '{{$item}}',

            @endforeach
        ];

        var options = {
            chart: {
                height: 350,
                type: 'area',
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'smooth'
            },
            series: [{
                name: 'میزان فروش زیر مجموعه ها',
                data: data
            }],

            xaxis: {
                type: 'datetime',

                categories: dates,
            },
            tooltip: {
                x: {
                    format: 'dd/MM/yy'
                },
            }
        }

        var chart = new ApexCharts(
            document.querySelector("#apex_chart_three"),
            options
        );

        chart.render();
    </script>


    <script>
        dates = [
            @foreach($dates as $date)
                '{{$date}}',

            @endforeach

        ];

        data = [
            @foreach($sub_buy as $item)
                '{{$item}}',

            @endforeach
        ];

        var options = {
            chart: {
                height: 350,
                type: 'area',
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'smooth'
            },
            series: [{
                name: 'میزان خرید زیر مجموعه ها',
                data: data
            }],

            xaxis: {
                type: 'datetime',

                categories: dates,
            },
            tooltip: {
                x: {
                    format: 'dd/MM/yy'
                },
            }
        }

        var chart = new ApexCharts(
            document.querySelector("#apex_chart_three2"),
            options
        );

        chart.render();
    </script>

@endsection
