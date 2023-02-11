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
                        <a href=""> @lang('site.change_user_password') </a>
                    </li>


                </ol>
            </nav>
        </div>


        <div class="row">
            <div class="col-md-12">


                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">@lang('site.change_user_password')</h6>
                        @if(session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                        <form method="POST" action="{{ route('users.change' , $user->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method("PATCH")
                            <div class="form-group">
                                @error('password')
                                <small id="emailHelp" class="text text-danger font-weight-bolder">
                                    {{ $message }}
                                </small>
                                @enderror
                                <label for="">@lang('site.enter_new_password')</label>
                                <input type="password" name="password" class="form-control"   placeholder="@lang('site.enter_new_password')"
                                       required>
                            </div>

                            <div class="form-group">
                                @error('password_confirmation')
                                <small id="emailHelp" class="text text-danger font-weight-bolder">
                                    {{ $message }}
                                </small>
                                @enderror
                                <label for="">@lang('site.enter_again_new_password')</label>
                                <input type="password" name="password_confirmation" class="form-control"   placeholder="@lang('site.enter_again_new_password')"
                                       required>
                            </div>



                            <button type="submit" class="btn btn-primary">@lang('site.change_user_password') </button>
                        </form>

                    </div>
                </div>


            </div>
        </div>


    </div>
@endsection

<div class="eskandari farahmand hemmati">
    <ul>

    </ul>
</div>

