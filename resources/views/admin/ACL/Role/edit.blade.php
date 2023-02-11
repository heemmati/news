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
                        <a href="">
                            @lang('site.edit_role')
                        </a>
                    </li>

                </ol>
            </nav>
        </div>


        <div class="row">
            <div class="col-md-12">



                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title"> @lang('site.edit_role')</h6>
                        <form method="POST" action="{{ route('roles.update' , $role->id ) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label for="">@lang('site.enter_the_role_name')</label>
                                <input type="text" name="name" class="form-control" value="{{ $role->name }}" placeholder="@lang('site.enter_the_role_name')">
                            </div>
                            <div class="form-group">
                                <label for="">@lang('site.enter_the_role_slug')</label>
                                <input type="text" name="slug" class="form-control" value="{{ $role->slug }}" placeholder="@lang('site.enter_the_role_slug')">
                            </div>

                            <button type="submit" class="btn btn-primary">@lang('site.edit_role') </button>
                        </form>

                    </div>
                </div>



            </div>
        </div>


    </div>
@endsection


