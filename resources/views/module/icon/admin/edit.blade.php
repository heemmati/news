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
                        <a href=""> @lang('site.icons_management') </a>
                    </li>


                </ol>
            </nav>
        </div>


        <div class="row">
            <div class="col-md-12">


                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">@lang('site.update_icon') </h6>


                        <form method="POST" action="{{ route('icons.update' , $icon->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            @include('error.forms')


                            {{-- Title --}}
                            <x-form.text require="1" type="{{ __('site.icons_singular') }}" name="title" namefa="{{ __('site.title') }}" :value="$icon->title"></x-form.text>


                            <x-form.text require="1" type="{{ __('site.icons_singular') }}" name="src" namefa="{{ __('site.class') }}" :value="$icon->src"></x-form.text>


                            <button type="submit" class="btn btn-primary">@lang('site.update_icon') </button>
                        </form>

                    </div>
                </div>


            </div>
        </div>


    </div>
@endsection
