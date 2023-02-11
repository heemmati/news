@extends ('admin.layout.master')


@section('content')
    <div class="content">


        <div class="page-header">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.panel') }}">@lang('site.dashboard')</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('reports.marketers') }}">  گزارش گیری از بازاریابان </a>
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
                                <form action="{{ route('reports.marketers.report') }}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label for="">تاریخ شروع</label>
                                        <input  type="date" name="start">
                                    </div>
                                    <div class="form-group">
                                        <label for="">تاریخ اتمام</label>
                                        <input  type="date" name="end">
                                    </div>
                                    <button class="btn btn-primary" type="submit"> اعمال </button>
                                </form>
                            </div>

                        </div>
                        <div class="card">
                            <div class="card-body">
                                @if(isset($marketers) && !empty($marketers))
                                    <table  class="table table-striped table-bordered">
                                        <thead>
                                        <tr>

                                            <th>کد بازاریابی</th>
                                            <th>نام و نام خانوادگی</th>
                                            <th>میزان امتیاز دریافتی از خرید</th>
                                            <th>میزان امتیاز دریافتی از فروش</th>

                                            <th>میزان خرید زیر مجموعه ها</th>
                                            <th> میزان فروش زیرمجموعه ها</th>
                                            <th>میزان پورسانت خرید زیر مجموعه ها</th>
                                            <th> میزان پورسانت فروش زیرمجموعه ها</th>
                                            <th>امتیاز کل</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($marketers as $marketer)
                                                <tr>
                                                    <td>{{ $marketer->presentation_code }}</td>

                                                    <td>{{ $marketer->name }}</td>
                                                    <td>
                                                        {{ $marketer->buy($start , $end) }}
                                                    </td>
                                                    <td>
                                                        {{ $marketer->sell($start , $end) }}
                                                    </td>
                                                    <td>
                                                        {{ $marketer->sub_buy($start , $end) }}
                                                    </td>
                                                    <td>
                                                        {{ $marketer->sub_sell($start , $end) }}
                                                    </td>


                                                    <td>
                                                        {{ $marketer->sub_buy_reward($start , $end) }}
                                                    </td>
                                                    <td>
                                                        {{ $marketer->sub_sell_reward($start , $end) }}
                                                    </td>


                                                    <td>
                                                        @if(isset($marketer->wallet) && !empty($marketer->wallet))
                                                        {{ $marketer->wallet->rewards }}
                                                            @else
                                                            0
                                                            @endif
                                                    </td>
                                                </tr>
                                        @endforeach
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <th>کد بازاریابی</th>
                                            <th>نام و نام خانوادگی</th>
                                            <th>میزان امتیاز دریافتی از خرید</th>
                                            <th>میزان امتیاز دریافتی از فروش</th>
                                            <th>میزان خرید زیر مجموعه ها</th>
                                            <th> میزان فروش زیرمجموعه ها</th>
                                            <th>میزان پورسانت خرید زیر مجموعه ها</th>
                                            <th> میزان پورسانت فروش زیرمجموعه ها</th>
                                            <th>امتیاز کل</th>

                                        </tr>
                                        </tfoot>
                                    </table>
                                @else
                                    <div class="alert alert-secondary" role="alert">
                                        هیچ بازاریابی یافت نشد
                                    </div>
                                @endif
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
        // Deleting Warning and Confirm Needed
        $('.sa-warning').on('click', function () {
            swal({
                title: "آیا برای حذف اطمینان دارید؟",
                text: "با حذف این مورد شما قادر به بازگردانی آن نخواهید بود",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "بله! حذف کن",
                closeOnConfirm: false
            })
                .then((willDelete) => {
                    if (willDelete) {
                        if (willDelete) {
                            $(this).siblings('form').submit();
                        }
                    } else {
                        swal("Your imaginary file is safe!", {
                            icon: "error",
                        });
                    }
                });
        });


    </script>
@endsection
