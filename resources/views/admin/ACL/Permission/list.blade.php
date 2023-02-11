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
                        <a href="{{ route('permissions.index') }}">@lang('site.permissions_list')</a>
                    </li>

                </ol>
            </nav>

            <div class="page-header_actions">
                @can('permissions.create')
                    <a class="btn btn-primary" href="{{ route('permissions.create') }}">
                        @lang('site.permissions_create')
                    </a>
                @endcan

                @can('permission.recover')
                    <a class="btn btn-primary" href="{{ route('permission.recover') }}">
                        @lang('site.permissions_uptodate')
                    </a>
                @endcan

                @can('permission.edit.group')
                    <a class="btn btn-primary" href="{{ route('permission.edit.group') }}">
                        @lang('site.edit_group_permissions')
                    </a>
                @endcan

            </div>

        </div>


        <div class="row">
            <div class="col-md-12">

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                @if(isset($permissions) && !empty($permissions))
                                    <table id="example1" class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th>@lang('site.id')</th>
                                            <th> @lang('site.name')</th>
                                            <th>@lang('site.slug')</th>
                                            <th>  @lang('site.operations')</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($permissions as $permission)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $permission->name }}</td>
                                                <td>{{ $permission->slug }}</td>
                                                <td>


                                                    @can('permissions.edit')
                                                        <a href="{{ route('permissions.edit' , $permission->id) }}">
                                                            <i class="fa fa-pen"></i>
                                                        </a>
                                                    @endcan
                                                    @can('permissions.destroy')

                                                        <a href="javascript:void(0)" class="sa-warning">
                                                            <i class="fa fa-trash"></i>
                                                        </a>
                                                        {{--Deleting Form--}}
                                                        <form
                                                            action="{{ route('permissions.destroy' , $permission->id) }}"
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
                                            <th>@lang('site.id')</th>
                                            <th> @lang('site.name')</th>
                                            <th>@lang('site.slug')</th>
                                            <th>  @lang('site.operations')</th>
                                        </tr>
                                        </tfoot>
                                    </table>
                                @else
                                    <div class="alert alert-secondary" role="alert">
                                        @lang('site.nothing_found')
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
