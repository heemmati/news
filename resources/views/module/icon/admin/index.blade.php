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
                        <h6 class="card-title">@lang('site.upload_new_icon')</h6>


                        <form method="POST" action="{{ route('icons.store') }}" enctype="multipart/form-data">
                            @csrf

                            @include('error.forms')

                                                    {{-- Title --}}
                            <x-form.text require="1" value="{{ old('title') }}" type="{{ __('site.icons_singular') }}" name="title" namefa="{{ __('site.title') }}"></x-form.text>


                            <x-form.text require="1" value="{{ old('src') }}" type="{{ __('site.icons_singular') }}" name="src" namefa="{{ __('site.class') }}"></x-form.text>




                            <button type="submit" class="btn btn-primary">@lang('site.upload_new_icon')</button>
                        </form>

                    </div>
                </div>


                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">@lang('site.icons_search')</h6>
                        <form action="{{ route('icons.index') }}" method="GET">
                            <div class="row">
                                <div class="col-12 col-md-4">
                                    <x-form.text name="title" namefa="{{ __('site.title') }}"
                                                 value="{{ !empty($filtered['title']) ? $filtered['title'] : '' }}"
                                                 type="{{ __('routes.icons_singular') }}" require="0"></x-form.text>
                                </div>

                                <div class="col-12 col-md-4">
                                    <x-form.text name="src" namefa="{{ __('site.class') }}"
                                                 value="{{ !empty($filtered['src']) ? $filtered['src'] : '' }}"
                                                 type="{{ __('routes.icons_singular') }}" require="0"></x-form.text>

                                </div>
                                <div class="col-12 col-md-4">
                                    <x-form.text name="start_date" kind="date" namefa="{{ __('site.start_date_upload') }}"
                                                 value="{{ !empty($filtered['start_date']) ? $filtered['start_date'] : '' }}"
                                                 type="{{ __('routes.icons_singular') }}" require="0"></x-form.text>
                                </div>
                                <div class="col-12 col-md-4">
                                    <x-form.text name="end_date" kind="date" namefa="{{ __('site.end_date_upload') }}"
                                                 value="{{ !empty($filtered['end_date']) ? $filtered['end_date'] : '' }}"
                                                 type="{{ __('routes.icons_singular') }}" require="0"></x-form.text>
                                </div>
                                <div class="col-12 col-md-4">
                                    <button type="submit" class="btn btn-danger">{{ __('routes.search') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>



                @if(isset($icons) && !empty($icons))


                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">@lang('site.upload_new_icon')</h6>


                            <div class="row">

                                @foreach($icons as $icon)



                                    <div class="col-md-2">
                                        <div class="uploaded_image">
                                            <span class="badge badge-dark">
                                                <i class="{{ $icon->src }}"></i>
                                            </span>

                                            @can('icons.edit')
                                            <a href="{{ route('icons.edit' , $icon->id) }}" class="edit_icon">
                                                <i class="far fa-pencil"></i>
                                            </a>
                                            @endcan

                                            @can('icons.destroy')
                                                <a href="javascript:void(0)" class="remove_icon">
                                                    <i class="far fa-times"></i>
                                                </a>
                                            <form
                                                action="{{ route('icons.destroy' , $icon->id) }}"
                                                method="POST" style="display: none">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn-default"></button>
                                            </form>
                                            @endcan
                                            {{--Deleting Form--}}
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif

            </div>
        </div>


    </div>
@endsection

@section('scripts')


    <script>

        $(document).on('click', '.remove_icon', function () {

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
