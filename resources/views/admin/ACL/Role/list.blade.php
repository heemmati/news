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
                        <a href="{{ route('roles.index') }}">@lang('site.role_management')</a>
                    </li>

                </ol>
            </nav>
            @can('roles.create')
                <div class="page-header_actions">

                    <a class="btn btn-primary" href="{{ route('roles.create') }}">
                        @lang('site.create_new_role')
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
                                @if(isset($roles) && !empty($roles))
                                    <table id="example1" class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th>@lang('site.id')</th>
                                            <th>@lang('site.name')</th>
                                            <th> @lang('site.slug')</th>
                                            <th>@lang('site.operations')</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($roles as $role)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $role->name }}</td>
                                                <td>{{ $role->slug }}</td>
                                                <td>
                                                    @can('role-permissions.index')
                                                        <a href="{{ route('role-permissions.index' , $role->id ) }}">
                                                           @lang('site.access_management')
                                                        </a>
                                                    @endcan
                                                    @can('roles.edit')
                                                        <a href="{{ route('roles.edit' , $role->id) }}">
                                                            <i class="fa fa-pen"></i>
                                                        </a>
                                                    @endcan
                                                    @can('roles.destroy')

                                                        <a href="javascript:void(0)" class="sa-warning">
                                                            <i class="fa fa-trash"></i>
                                                        </a>
                                                        {{--Deleting Form--}}

                                                        <form action="{{ route('roles.destroy' , $role->id) }}"
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
                                            <th>@lang('site.name')</th>
                                            <th> @lang('site.slug')</th>
                                            <th>@lang('site.operations')</th>
                                        </tr>
                                        </tfoot>
                                    </table>
                                @else
                                    <div class="alert alert-secondary" role="alert">
                                        @lang('site.no_role_found')
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
