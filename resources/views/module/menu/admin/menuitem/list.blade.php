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
                        <a href="{{ route('menu-items.index') }}">مدیریت آیتم های منو</a>
                    </li>

                </ol>
            </nav>

            @can('menu-items.create')
                <div class="page-header_actions">

                    <a class="btn btn-dribbble" href="{{ route('menu-items.create') }}">
                        ایجاد آیتم منوی جدید
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
                                @if(isset($items) && !empty($items))
                                    <table id="example1" class="table table-striped table-bordered">
                                        <thead>
                                        <tr>

                                            <th>#</th>
                                            <th>عنوان آیتم منو</th>
                                            <th>برای منو</th>
                                            <th> لینک آیتم منو</th>
                                            <th>وضعیت منو</th>
                                            <th>عملیات</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($items as $item)

                                            <tr>
                                                <td>{{ $loop->iteration }}</td>

                                                <td>
                                                    {{ $item->title }}
                                                </td>

                                                <td>
                                                    {{ $item->menu->title }}
                                                </td>
                                                <td>
                                                    @if(isset($item->link) && !empty($item->link))
                                                        <a class="btn btn-success" href="  {{ $item->link }}">
                                                            لینک آیتم منو
                                                        </a>
                                                    @endif

                                                </td>


                                                <td>
                                                    <x-status-show :status="$item->status"></x-status-show>
                                                </td>


                                                <td>

                                                    @can('menu-items.edit')
                                                        <a href="{{ route('menu-items.edit' , $item->id) }}">
                                                            <i class="fa fa-pen"></i>
                                                        </a>
                                                    @endcan
                                                    @can('menu-items.show')
                                                        <a href="{{ route('menu-items.show' , $item->id ) }}">
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                    @endcan


                                                    @can('menu-items.destroy')
                                                        <a href="javascript:void(0)" class="sa-warning">
                                                            <i class="fa fa-trash"></i>
                                                        </a>
                                                        {{--Deleting Form--}}
                                                        <form
                                                            action="{{ route('menu-items.destroy' , $item->id) }}"
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
                                            <th>عنوان آیتم منو</th>
                                            <th>برای منو</th>
                                            <th> لینک آیتم منو</th>
                                            <th>وضعیت منو</th>
                                            <th>عملیات</th>
                                        </tr>
                                        </tfoot>
                                    </table>
                                @else
                                    <div class="alert alert-secondary" role="alert">
                                        هیچ آیتمی یافت نشد!
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
