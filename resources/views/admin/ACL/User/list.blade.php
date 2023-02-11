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
                        <a href="{{ route('users.index') }}">@lang('site.users_management')</a>
                    </li>

                </ol>
            </nav>

            @can('users.create')
                <div class="page-header_actions">

                    <a class="btn btn-dribbble" href="{{ route('users.create') }}">@lang('site.create_users')</a>

                </div>
            @endcan




        </div>


        <div class="row">
            <div class="col-md-12">

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                @if(isset($users) && !empty($users))
                                    <table id="example1" class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th>@lang('site.id')</th>
                                            <th>@lang('site.name')</th>
                                            <th>@lang('site.avatar')</th>
                                            <th>@lang('site.role')</th>
                                            <th>@lang('site.email')</th>
                                            <th> @lang('site.mobile_phone')</th>
                                            <th> @lang('site.operations')</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($users as $user)
                                            @if( !\App\Utility\Acl::isSuperAdmin($user->id) || \App\Utility\Acl::isSuperAdmin(auth()->id())  )

                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $user->name }}</td>
                                                    <td>
                                                        @if(isset($user->avatar) && !empty($user->avatar))
                                                        <a class="user_avatar_image" href="{{  Storage::url($user->avatar) }}">
                                                            <img src="{{  Storage::url($user->avatar) }}" alt="">
                                                        </a>
                                                        @else
                                                        @lang('site.no_image')
                                                        @endif

                                                    </td>
                                                    <td>
                                                        {{ \App\Utility\Acl::getRole($user->role) }}
                                                    </td>
                                                    <td>{{ $user->email }}</td>
                                                    <td>{{ $user->mobile }}</td>
                                                    <td>


                                                        <div class="btn-group-sm">
                                                            @can('user-roles.index')
                                                                <a class="btn  btn-sm btn-success"
                                                                   href="{{ route('user-roles.index' , $user->id ) }}">
                                                                  @lang('site.role_management')
                                                                </a>
                                                            @endcan
                                                            @can('users.change-password')
                                                                <a class="btn btn-sm btn-danger"
                                                                   href="{{ route('users.change-password' , $user->id ) }}">
                                                                   @lang('site.recovery_password')
                                                                </a>
                                                            @endcan
                                                            @can('user-permissions.index')
                                                                <a class="btn btn-sm btn-primary"
                                                                   href="{{ route('user-permissions.index' , $user->id ) }}">
                                                                   @lang('site.access_management')
                                                                </a>
                                                            @endcan
                                                        </div>
                                                        @can('users.edit')
                                                            <a href="{{ route('users.edit' , $user->id) }}">
                                                                <i class="fa fa-pen"></i>
                                                            </a>
                                                        @endcan
                                                        @can('users.show')
                                                            <a href="{{ route('users.show' , $user->id ) }}">
                                                                <i class="fa fa-eye"></i>
                                                            </a>
                                                        @endcan


                                                        @can('users.destroy')
                                                            <a href="javascript:void(0)" class="sa-warning">
                                                                <i class="fa fa-trash"></i>
                                                            </a>
                                                            {{--Deleting Form--}}
                                                            <form
                                                                action="{{ route('users.destroy' , $user->id) }}"
                                                                method="POST" style="display: none">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn-default"></button>
                                                            </form>
                                                            {{--Deleting Form--}}
                                                        @endcan

                                                    </td>
                                                </tr>


                                            @endif
                                        @endforeach
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <th>@lang('site.id')</th>
                                            <th>@lang('site.name')</th>
                                            <th>@lang('site.avatar')</th>
                                            <th>@lang('site.role')</th>
                                            <th>@lang('site.email')</th>
                                            <th> @lang('site.mobile_phone')</th>
                                            <th> @lang('site.operations')</th>
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
