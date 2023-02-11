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
                        <a href="{{ route('galleries.index') }}">
                            @lang('site.galleries_management')
                        </a>
                    </li>

                </ol>
            </nav>

            @can('galleries.create')
                <div class="page-header_actions">

                    <a class="btn btn-dribbble" href="{{ route('galleries.create') }}">
                       @lang('site.new_gallery_create')
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
                                @if(isset($galleries) && !empty($galleries))
                                    <table id="example1" class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>@lang('site.gallery_title')</th>
                                            <th>@lang('site.images_count')</th>

                                            <th>@lang('site.creation_date')</th>
                                            <th>@lang('site.operations')</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($galleries as $gallerie)

                                            <tr>
                                                <td>{{ $loop->iteration }}</td>

                                                <td>
                                                    {{ $gallerie->title }}
                                                </td>

                                                <td>
                                                    {{ count($gallerie->images) }}
                                                    {{ __('site.images_singular') }}
                                                </td>



                                                <td>
                                                    {{ $gallerie->timeHandler() }}
                                                </td>


                                                <td>

                                                    @can('galleries.edit')
                                                        <a href="{{ route('galleries.edit' , $gallerie->id) }}">
                                                            <i class="fa fa-pen"></i>
                                                        </a>
                                                    @endcan


                                                    @can('galleries.destroy')
                                                        <a href="javascript:void(0)" class="sa-warning">
                                                            <i class="fa fa-trash"></i>
                                                        </a>
                                                        {{--Deleting Form--}}
                                                        <form
                                                            action="{{ route('galleries.destroy' , $gallerie->id) }}"
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
                                            <th>@lang('site.gallery_title')</th>
                                            <th>@lang('site.images_count')</th>

                                            <th>@lang('site.creation_date')</th>
                                            <th>@lang('site.operations')</th>
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
