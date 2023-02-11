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
                        <a href="">ویرایش دسترسی های نقش </a>
                    </li>

                </ol>
            </nav>
        </div>


        <div class="row">
            <div class="col-md-12">



                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">@lang('site.role_permission_edit')</h6>
                        <form method="POST" style="column-count: 3" action="{{ route('roles-permissions.update')}}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="role" value="{{  $role->id }}">
                            @foreach($permissions as $permission)
                            <div class="form-group">
                                <div class="custom-control custom-checkbox custom-checkbox-dark">
                                    <input value="{{ $permission->id }}"  name="permissions[]" type="checkbox" class="custom-control-input" id="customCheck{{$permission->id}}" {{ in_array($permission->id , $permitted ) == true ? 'checked' : ''}}>
                                    <label class="custom-control-label" for="customCheck{{$permission->id}}">{{ $permission->name }}</label>
                                </div>
                            </div>
                            @endforeach
                            <button type="submit" class="btn btn-primary">  @lang('site.role_permission_edit') </button>
                        </form>

                    </div>
                </div>



            </div>
        </div>


    </div>
@endsection


