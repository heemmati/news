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
                        <a href=""> @lang('site.edit_group_permissions')</a>
                    </li>

                </ol>
            </nav>
        </div>


        <div class="row">
            <div class="col-md-12">



                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title"> @lang('site.edit_group_permissions')</h6>
                        <form
                            method="POST"

                            action="{{ route('permission.update.group')}}"
                            enctype="multipart/form-data"
                        >
                            @csrf

                            <button type="submit" class="btn btn-primary">   @lang('site.user_permission_edit')</button>



                            <div class="row">


                            @foreach($permissions as $permission)
                                <div class="col-12 col-md-4">
                                    <div class="form-group">
                                        <label>{{ $permission->slug }}</label>
                                        <input value="{{ $permission->name }}" class="form-control"  name="permissions[{{ $permission->slug }}]" type="text"  >

                                    </div>
                                </div>

                            @endforeach

                            </div>
                            <button type="submit" class="btn btn-primary">   @lang('site.user_permission_edit')</button>
                        </form>

                    </div>
                </div>



            </div>
        </div>


    </div>
@endsection


