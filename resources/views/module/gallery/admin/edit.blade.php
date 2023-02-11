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
                        <a href="">@lang('site.galleries_edit') </a>
                    </li>


                </ol>
            </nav>
        </div>


        <div class="row">
            <div class="col-md-12">


                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">@lang('site.galleries_edit')</h6>
                        <h4>@lang('site.choose_image_in_gallery')</h4>


                        <form method="POST"
                              action="{{ route('galleries.update' , $gallery->id ) }}"
                              enctype="multipart/form-data">

                            @csrf
                            @method('PATCH')

                            @include('error.forms')


                            <div class="row">
                                <div class="col-12 col-md-6">


                                    <x-form.text name="title" namefa="{{ __('site.title') }}"
                                                 value="{{ $gallery->title }}"
                                                 type="{{ __('routes.galleries_singular') }}" require="1"></x-form.text>


                                    <x-form.text name="entitle" namefa="{{ __('site.entitle') }}"
                                                 value="{{ $gallery->entitle }}"
                                                 type="{{ __('routes.galleries_singular') }}" require="0"></x-form.text>


                                </div>

                                <div class="col-12 col-md-6">
                                    {{-- Description --}}
                                    <x-form.textarea name="description" namefa="{{ __('site.description') }}"
                                                     value="{{ $gallery->description }}"
                                                     type="{{ __('routes.galleries_singular') }}"
                                                     require="0"></x-form.textarea>

                                </div>
                            </div>


                            <x-form.textarea name="body" namefa="{{ __('site.body') }}"
                                             value="{{ $gallery->body }}"
                                             type="{{ __('routes.galleries_singular') }}" require="0"></x-form.textarea>


                            <div class="flex-gallery-choose">

                                <div class="flex-gallery-choose__item">
                                    <a id="image_button" href="javascript:void(0)">
                                        <i class="far fa-plus"></i>
                                    </a>


                                </div>
                                @if(isset($gallery->images) && !empty($gallery->images) && count($gallery->images))
                                    @foreach($gallery->images as $image)
                                        <div class="flex-gallery-choose__item">
                                            <input type="hidden" name="images[]" value="{{ $image->id }}">
                                            <img src="{{ \Illuminate\Support\Facades\Storage::url($image->src) }}"
                                                 class="showing_image" alt="{{ $image->alt }}">
                                            <a href="javascript:void(0)" class="delete_gallery_image">
                                                <i class="fas fa-times"></i>
                                            </a>
                                        </div>
                                    @endforeach
                                @endif


                            </div>

                            <br>

                            <button class="btn btn-success">
                                @lang('site.galleries_edit')
                            </button>
                        </form>

                    </div>
                </div>


                @if(isset($images) && !empty($images))


                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">@lang('site.upload_new_image')</h6>


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


        remove_parent_element('.delete_gallery_image');

    </script>
@endsection
