@extends ('admin.layout.master')


@section('content')
    <div class="content">


        <div class="page-header">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.panel') }}">داشبورد</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('newspapers.index') }}">لیست خبرنامه ها </a>
                    </li>

                </ol>
            </nav>

            @can('newspapers.create')
                <div class="page-header_actions">

                    <a class="btn btn-dribbble" href="{{ route('newspapers.create') }}">ارسال خبرنامه جدید</a>

                </div>
            @endcan

        </div>


        <div class="row">
            <div class="col-md-12">

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                @if(isset($newspapers) && !empty($newspapers))
                                    <table id="example1" class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th>آیدی</th>
                                            <th>عنوان</th>
                                            <th>وضعیت</th>
                                            <th>عملیات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($newspapers as $newspaper)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $newspaper->title }}</td>

                                                <td>


                                                        <a href="javascript:void(0)"
                                                           class="btn btn-xs  {{  \App\Utility\Newspaper::get_status_class($newspaper->status) }}">
                                                            {{  \App\Utility\Newspaper::get_status($newspaper->status) }}
                                                        </a>

                                                </td>

                                                <td>


                                                    @can('newspapers.show')
                                                        <a href="{{ route('newspapers.show' , $newspaper->id ) }}">
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                    @endcan


                                                    @can('newspapers.destroy')
                                                        <a href="javascript:void(0)" class="sa-warning">
                                                            <i class="fa fa-trash"></i>
                                                        </a>
                                                        {{--Deleting Form--}}
                                                        <form
                                                            action="{{ route('newspapers.destroy' , $newspaper->id) }}"
                                                            method="POST" style="display: none">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn-default"></button>
                                                        </form>
                                                        {{--Deleting Form--}}
                                                    @endcan

                                                </td>
                                            </tr>

                                        @endforeach
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <th>آیدی</th>
                                            <th>عنوان</th>
                                            <th>وضعیت</th>
                                            <th>عملیات</th>
                                        </tr>
                                        </tfoot>
                                    </table>
                                @else
                                    <div class="alert alert-secondary" role="alert">
                                        هیچ خبرنامه ای یافت نشد
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
