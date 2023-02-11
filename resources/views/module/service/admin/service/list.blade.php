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
                        <a href="{{ route('services.index') }}">مدیریت خدمات ها</a>
                    </li>

                </ol>
            </nav>

            @can('services.create')
                <div class="page-header_actions">

                    <a class="btn btn-dribbble" href="{{ route('services.create') }}">
                        ایجاد خدمات جدید
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
                                @if(isset($services) && !empty($services))
                                    <table id="example1" class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>عنوان خدمات</th>
                                            <th>تصویر خدمات</th>
                                            <th>وضعیت خدمات</th>
                                            <th>تاریخ ایجاد</th>
                                            <th>عملیات</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($services as $service)

                                            <tr>
                                                <td>{{ $loop->iteration }}</td>

                                                <td>
                                                    {{ $service->title }}
                                                </td>

                                                <td class="td-image">
                                                    @if(isset($service->images[0]) && !empty($service->images[0]))
                                                        <img src="{{ \Illuminate\Support\Facades\Storage::url($service->images[0]->src) }}" alt="">
                                                    @endif
                                                </td>


                                                <td>
                                                    <x-status-show :status="$service->status"></x-status-show>
                                                </td>

                                                <td>
                                                    {{ $service->timeHandler() }}
                                                </td>


                                                <td>

                                                    @can('services.edit')
                                                        <a href="{{ route('services.edit' , $service->id) }}">
                                                            <i class="fa fa-pen"></i>
                                                        </a>
                                                    @endcan
                                                    @can('services.show')
                                                        <a href="{{ route('services.show' , $service->id ) }}">
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                    @endcan


                                                    @can('services.destroy')
                                                        <a href="javascript:void(0)" class="sa-warning">
                                                            <i class="fa fa-trash"></i>
                                                        </a>
                                                        {{--Deleting Form--}}
                                                        <form
                                                            action="{{ route('services.destroy' , $service->id) }}"
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
                                            <th>عنوان خدمات</th>
                                            <th>تصویر خدمات</th>
                                            <th>وضعیت خدمات</th>
                                            <th>تاریخ ایجاد</th>
                                            <th>عملیات</th>
                                        </tr>
                                        </tfoot>
                                    </table>
                                @else
                                    <div class="alert alert-secondary" role="alert">
                                        هیچ خدماتی یافت نشد!
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
