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
                        <a href="{{ route('portofolios.index') }}">مدیریت نمونه کار ها</a>
                    </li>

                </ol>
            </nav>

            @can('portofolios.create')
                <div class="page-header_actions">

                    <a class="btn btn-dribbble" href="{{ route('portofolios.create') }}">
                        ایجاد نمونه کار  جدید
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
                                @if(isset($portofolios) && !empty($portofolios))
                                    <table id="example1" class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>عنوان نمونه کار</th>
                                            <th>تصویر نمونه کار</th>
                                            <th>دسته بندی نمونه کار</th>
                                            <th>وضعیت نمونه کار</th>
                                            <th>تاریخ ایجاد</th>
                                            <th>عملیات</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($portofolios as $portofolio)

                                            <tr>
                                                <td>{{ $loop->iteration }}</td>

                                                <td>
                                                    {{ $portofolio->title }}
                                                </td>

                                                <td>
                                                    {{ $portofolio->image }}
                                                </td>

                                                <td>
                                                    <x-category-td :categories="$portofolio->categories"></x-category-td>
                                                </td>

                                                <td>
                                                    <x-status-show :status="$portofolio->status"></x-status-show>
                                                </td>

                                                <td>
                                                    {{ $portofolio->timeHandler() }}
                                                </td>


                                                <td>

                                                    @can('portofolios.edit')
                                                        <a href="{{ route('portofolios.edit' , $portofolio->id) }}">
                                                            <i class="fa fa-pen"></i>
                                                        </a>
                                                    @endcan
                                                    @can('portofolios.show')
                                                        <a href="{{ route('portofolios.show' , $portofolio->id ) }}">
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                    @endcan


                                                    @can('portofolios.destroy')
                                                        <a href="javascript:void(0)" class="sa-warning">
                                                            <i class="fa fa-trash"></i>
                                                        </a>
                                                        {{--Deleting Form--}}
                                                        <form
                                                            action="{{ route('portofolios.destroy' , $portofolio->id) }}"
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
                                            <th>عنوان نمونه کار</th>
                                            <th>تصویر نمونه کار</th>
                                            <th>دسته بندی نمونه کار</th>
                                            <th>وضعیت نمونه کار</th>
                                            <th>تاریخ ایجاد</th>
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
