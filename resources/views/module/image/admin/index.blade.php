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
                        <a href="">  @lang('site.image_management') </a>
                    </li>


                </ol>
            </nav>
        </div>


        <div class="row">
            <div class="col-md-12">


                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-md-12">
                                <h6 class="card-title">@lang('site.upload_new_image')</h6>

                            </div>

                        </div>


                        <form method="POST" action="{{ route('images.store') }}" enctype="multipart/form-data">
                            @csrf
                            @include('error.forms')

                            <div class="row">
                                <div class="col-12 col-md-6">
                                    {{-- Title --}}
                                    <x-form.text require="1" type="{{ __('site.images__singular') }}" name="title"
                                                 value="{{ old('title') }}"
                                                 namefa="{{ __('site.title') }}"></x-form.text>

                                </div>

                                <div class="col-12 col-md-6">

                                    {{-- Title --}}
                                    <x-form.text require="0" type="{{ __('site.images__singular') }}" name="entitle"
                                                 value="{{ old('entitle') }}"
                                                 namefa="{{ __('site.entitle') }}"></x-form.text>

                                </div>

                                <div class="col-12 col-md-6">
                                    {{-- Alt --}}
                                    <x-form.text require="1" type="{{ __('site.images__singular') }}" name="alt"
                                                 value="{{ old('alt') }}"
                                                 namefa="{{ __('site.alt') }}"></x-form.text>

                                </div>

                                <div class="col-12 col-md-6">
                                    <x-form.image require="1" type="{{ __('site.images__singular') }}" name="src"
                                                  value="{{ old('src') }}"
                                                  namefa="{{ __('site.upload') }}"></x-form.image>
                                </div>

                            </div>


                            <button type="submit" class="btn btn-primary">@lang('site.upload_new_image')</button>
                        </form>

                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">@lang('site.images_search')</h6>
                        <form action="{{ route('images.index') }}" method="GET">
                            <div class="row">
                                <div class="col-12 col-md-4">
                                    <x-form.text name="title" namefa="{{ __('site.title') }}"
                                                 type="{{ __('routes.images_singular') }}" require="0"></x-form.text>
                                </div>
{{--                                <div class="col-12 col-md-4">--}}
{{--                                    <x-form.text name="etitle" namefa="{{ __('site.entitle') }}"--}}
{{--                                                 type="{{ __('routes.images_singular') }}" require="0"></x-form.text>--}}
{{--                                </div>--}}
                                <div class="col-12 col-md-4">
                                    <x-form.text name="alt" namefa="{{ __('site.alt') }}"
                                                 type="{{ __('routes.images_singular') }}" require="0"></x-form.text>
                                </div>
                                <div class="col-12 col-md-4">
                                    <x-form.text name="start_date" kind="date" namefa="{{ __('site.start_date_upload') }}"
                                                 type="{{ __('routes.images_singular') }}" require="0"></x-form.text>
                                </div>
                                <div class="col-12 col-md-4">
                                    <x-form.text name="end_date" kind="date" namefa="{{ __('site.end_date_upload') }}"
                                                 type="{{ __('routes.images_singular') }}" require="0"></x-form.text>
                                </div>
                                <div class="col-12 col-md-4">
                                    <button type="submit" class="btn btn-danger">{{ __('routes.search') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>


                @if(isset($images) && !empty($images))


                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">@lang('site.images_list')</h6>


                            <div class="row">

                                @foreach($images as $image)



                                    <div class="col-md-2">
                                        <div class="uploaded_image">
                                            <a class="choose_item" data-imageid="{{ $image->id }}"
                                               href="{{ \Illuminate\Support\Facades\Storage::url($image->src) }}"
                                               data-filemanager="{{ \Illuminate\Support\Facades\Storage::url($image->src) }}">
                                                <img src="{{ \Illuminate\Support\Facades\Storage::url($image->src) }}"
                                                     alt="{{ $image->alt }}" title="{{ $image->title }}">
                                            </a>

                                            @can('images.edit')
                                                <a href="{{ route('images.edit' , $image->id) }}" class="edit_image">
                                                    <i class="far fa-pencil"></i>
                                                </a>

                                            @endcan

                                            @can('images.destroy')

                                                <a href="javascript:void(0)" class="remove_image">
                                                    <i class="far fa-times"></i>
                                                </a>


                                                {{--Deleting Form--}}
                                                <form
                                                    action="{{ route('images.destroy' , $image->id) }}"
                                                    method="POST" style="display: none">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn-default"></button>
                                                </form>
                                                {{--Deleting Form--}}

                                            @endcan

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
        $("input.tagsinput-example").tagsinput('items');


        $('.choose_item').click(function () {
            let imageSrc = $(this).data('filemanager');
            let imageId = $(this).data('imageid');
            window.opener.$('#input_image').val(imageId);
            window.opener.$('#showing_image').attr('src', imageSrc);

            self.close();
        });


        var purpose;
        $(document).on('click', '.button-image', function () {
            window.open('/file-manager/fm-button', 'fm', 'width=1400,height=800');
            purpose = $(this);
        });

        // set file link
        function fmSetLink($url) {
            purpose.parent().parent().find('.image_label').val($url);
        }

    </script>




    <script>

        $('#close_button').click(function () {
            self.close();
        });


        $(document).on('click', '.remove_image', function () {

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
