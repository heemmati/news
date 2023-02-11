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
                        <a href="{{ route('regions.index') }}">مدیریت ناحیه خبری</a>
                    </li>

                </ol>
            </nav>

            @can('articles.create')
                <div class="page-header_actions">

                    <a class="btn btn-dribbble" href="{{ route('regions.create') }}">
                        ایجاد ناحیه خبری جدید
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
                                @if(isset($regions) && !empty($regions))
                                    <table id="example1" class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>عنوان ناحیه خبری</th>
                                            <th>تصویر ناحیه خبری</th>
                                            <th>وضعیت ناحیه خبری</th>
                                            <th>عملیات</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($regions as $region)

                                            <tr>
                                                <td>{{ $loop->iteration }}</td>

                                                <td>
                                                    <a href="{{$region->path()}}">
                                                        {{ $region->title }}

                                                    </a>
                                                </td>


                                                <td class="td_image">
                                                    @if( isset($region->image)  && !empty($region->image) )

                                                        <img src="{{ Storage::url($region->image) }}" alt="{{ Storage::url($region->image) }}">
                                                    @else


                                                    @endif

                                                </td>





                                                <td>
                                                    <x-status-show :status="$region->status" :model="$region"></x-status-show>

                                                </td>



                                                <td>

                                                    @can('regions.edit')
                                                        <a href="{{ route('regions.edit' , $region->id) }}">
                                                            <i class="fa fa-pen"></i>
                                                        </a>
                                                    @endcan


                                                    @can('regions.destroy')
                                                        <a href="javascript:void(0)" class="sa-warning">
                                                            <i class="fa fa-trash"></i>
                                                        </a>
                                                        {{--Deleting Form--}}
                                                        <form
                                                            action="{{ route('regions.destroy' , $region->id) }}"
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
                                            <th>عنوان ناحیه خبری</th>
                                            <th>تصویر ناحیه خبری</th>
                                            <th>وضعیت ناحیه خبری</th>
                                            <th>عملیات</th>

                                        </tr>
                                        </tfoot>
                                    </table>
                                @else
                                    <div class="alert alert-secondary" role="alert">
                                        @lang('site.no_region_found')
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
