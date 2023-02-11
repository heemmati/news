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
                        <a href="{{ route('cutcos.index') }}"> در خواست قطع همکاری ها </a>
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
                                @if(isset($cutcos) && !empty($cutcos))
                                    <table id="example1" class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th>آیدی</th>
                                            <th>نام کاربر</th>
                                            <th>سمت</th>
                                            <th>ایمیل</th>
                                            <th> موبایل</th>
                                            <th> وضعیت</th>
                                            <th>عملیات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($cutcos as $cutco)

                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $cutco->user->name }}</td>
                                                <td>
                                                    {{ \App\Utility\Acl::getRole($cutco->user->role) }}
                                                </td>
                                                <td>{{ $cutco->user->email }}</td>
                                                <td>{{ $cutco->user->mobile }}</td>

                                                <td>
                                                    @if($cutco->status == 1)
                                                        <span class="badge badge-sm badge-danger">
                                                            تایید شده
                                                        </span>
                                                    @else
                                                        <span class="badge badge-sm badge-info">
                                                            در انتظار تایید
                                                        </span>
                                                    @endif
                                                </td>
                                                <td>

                                                    @can('cutcos.confirm')
                                                        @if($cutco->status == 1)
                                                            <span class="badge badge-sm badge-danger">
                                                            تایید شده
                                                        </span>
                                                        @else
                                                            <a class="btn btn-sm btn-success" href="{{ route('cutcos.confirm' , $cutco->id) }}">
                                                                تایید
                                                            </a>
                                                        @endif

                                                    @endcan

                                                </td>
                                            </tr>



                                        @endforeach
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <th>آیدی</th>
                                            <th>نام کاربر</th>
                                            <th>سمت</th>
                                            <th>ایمیل</th>
                                            <th> موبایل</th>
                                            <th> وضعیت</th>
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
@endsection
