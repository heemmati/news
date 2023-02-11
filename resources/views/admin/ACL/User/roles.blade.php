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
                        <a href="">@lang('site.management_role_user')</a>
                    </li>

                </ol>
            </nav>
        </div>


        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">@lang('site.edit_this_user_roles')</h6>
                        <form method="POST" style="column-count: 3" action="{{ route('users-roles.update' , $user->id )}}" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="user" value="{{  $user->id }}">
                            @foreach($roles as $role)
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox custom-checkbox-dark">
                                        <input value="{{ $role->id }}"  name="roles[]" type="checkbox" class="custom-control-input" id="customCheck{{$role->id}}" {{ in_array($role->id , $roled ) == true ? 'checked' : ''}}>
                                        <label class="custom-control-label" for="customCheck{{$role->id}}">{{ $role->name }}</label>
                                    </div>
                                </div>
                            @endforeach
                            <button type="submit" class="btn btn-primary"> @lang('site.edit_roles')</button>
                        </form>

                    </div>
                </div>



            </div>
        </div>


    </div>
@endsection


