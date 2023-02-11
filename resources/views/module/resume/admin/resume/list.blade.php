@extends ('admin.layout.master')


@section('content')
    <div class="content">


        <x-admin.partials.page-header :breadcrumbs="$breadcrumbs"></x-admin.partials.page-header>

        <div class="row">
            <div class="col-md-12">

                <div class="row">
                    <div class="col-md-12">

                        <div class="card">
                            <div class="card-body">
                                @if(isset($resumes) && !empty($resumes))
                                    <table id="example1" class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th>آیدی</th>
                                            <th>عنوان رزومه</th>
                                            <th>عنوان شغلی</th>
                                            <th>محل</th>

                                            <th>وضعیت رزومه</th>
                                            <th>عملیات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach( $resumes as $resume)

                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $resume->title }}</td>
                                                <td>{{ $resume->post }}</td>
                                                <td>{{ $resume->where }}</td>

                                                <td>
                                                    <x-status-show :status="$resume->status"></x-status-show>

                                                </td>

                                                <td>

                                                    @can('resumes.edit')
                                                        <a href="{{ route('resumes.edit' , $resume->id) }}">
                                                            <i class="fa fa-pen"></i>
                                                        </a>
                                                    @endcan

                                                    @can('resumes.destroy')
                                                        <a href="javascript:void(0)" class="sa-warning">
                                                            <i class="fa fa-trash"></i>
                                                        </a>

                                                        {{--Deleting Form--}}
                                                        <form action="{{ route('resumes.destroy' , $resume->id) }}}"
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
                                            <th>عنوان رزومه</th>
                                            <th>عنوان شغلی</th>
                                            <th>محل</th>

                                            <th>وضعیت رزومه</th>
                                            <th>عملیات</th>
                                        </tr>
                                        </tfoot>
                                    </table>
                                @else
                                    <div class="alert alert-secondary" role="alert">
                                        هیچ رزومهی یافت نشد!
                                    </div>
                                @endif
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>


    </div>

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
