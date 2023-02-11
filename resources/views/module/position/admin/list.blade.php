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
                        <a href="{{ route('positions.index') }}">مدیریت جایگاه ها</a>
                    </li>

                </ol>
            </nav>

            @can('positions.create')
                <div class="page-header_actions">

                    <a class="btn btn-dribbble" href="{{ route('positions.create') }}">
                        ایجاد جایگاه جدید
                    </a>

                </div>
            @endcan


        </div>


        <div class="row">
            <div class="col-md-12">

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                @if(isset($positions) && !empty($positions))
                                    <table id="example1" class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>عنوان جایگاه</th>
                                            <th>کد برنامه نویسی</th>
                                            <th>تعداد نمایش مجموعه</th>
                                            <th> نوع جایگاه</th>

                                            <th>عملیات</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($positions as $position)

                                            <tr>
                                                <td>{{ $loop->iteration }}</td>

                                                <td>
                                                    {{ $position->title }}
                                                </td>

                                                <td>
                                                    {{ $position->code }}
                                                </td>

                                                <td>
                                                    {{ $position->limit }}
                                                </td>

                                                <td>
                                                    {{ $position->type }}
                                                </td>



                                                <td>

                                                    @can('positions.edit')
                                                        <a href="{{ route('positions.edit' , $position->id) }}">
                                                            <i class="fa fa-pen"></i>
                                                        </a>
                                                    @endcan
                                                    @can('positions.show')
                                                        <a href="{{ route('positions.show' , $position->id ) }}">
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                    @endcan


                                                    @can('positions.destroy')
                                                        <a href="javascript:void(0)" class="sa-warning">
                                                            <i class="fa fa-trash"></i>
                                                        </a>
                                                        {{--Deleting Form--}}
                                                        <form
                                                            action="{{ route('positions.destroy' , $position->id) }}"
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
                                            <th>#</th>
                                            <th>عنوان جایگاه</th>
                                            <th>کد برنامه نویسی</th>
                                            <th>تعداد نمایش مجموعه</th>
                                            <th> نوع جایگاه</th>

                                            <th>عملیات</th>
                                        </tr>
                                        </tfoot>
                                    </table>
                                @else
                                    <div class="alert alert-secondary" role="alert">
                                        @lang('site.no_user_found')
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

        $(document).on('click', '.sa-warning', function () {

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
c
