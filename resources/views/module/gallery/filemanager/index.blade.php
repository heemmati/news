@extends ('admin.layout.master_filemanager')


@section('content')
    <div class="content">


        <div class="page-header">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.panel') }}">@lang('site.dashboard')</a>
                    </li>

                    <li class="breadcrumb-item">
                        <a href=""> @lang('site.choose_gallery') </a>
                    </li>


                </ol>
            </nav>
        </div>


        <div class="row">
            <div class="col-md-12">


                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">@lang('site.galleries_search')</h6>
                        <form action="{{ route('gallery.filemanager') }}" method="GET">
                            <div class="row">
                                <div class="col-12 col-md-4">
                                    <x-form.text name="title" namefa="{{ __('site.title') }}"
                                                 value="{{ !empty($filtered['title']) ? $filtered['title'] : '' }}"
                                                 type="{{ __('routes.galleries_singular') }}" require="0"></x-form.text>
                                </div>
                                <div class="col-12 col-md-4">
                                    <x-form.text name="etitle" namefa="{{ __('site.entitle') }}"
                                                 value="{{ !empty($filtered['entitle']) ? $filtered['entitle'] : '' }}"
                                                 type="{{ __('routes.galleries_singular') }}" require="0"></x-form.text>
                                </div>
                               <div class="col-12 col-md-4">
                                    <x-form.text name="start_date" kind="date" namefa="{{ __('site.start_date_upload') }}"
                                                 value="{{ !empty($filtered['start_date']) ? $filtered['start_date'] : '' }}"
                                                 type="{{ __('routes.galleries_singular') }}" require="0"></x-form.text>
                                </div>
                                <div class="col-12 col-md-4">
                                    <x-form.text name="end_date" kind="date" namefa="{{ __('site.end_date_upload') }}"
                                                 value="{{ !empty($filtered['end_date']) ? $filtered['end_date'] : '' }}"
                                                 type="{{ __('routes.galleries_singular') }}" require="0"></x-form.text>
                                </div>
                                <div class="col-12 col-md-4">
                                    <button type="submit" class="btn btn-danger">{{ __('routes.search') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                @if(isset($galleries) && !empty($galleries))


                    <div class="card">
                        <div class="card-body">
                            <div class="row">

                                @foreach($galleries as $gallery)
                                    <div class="col-md-2">
                                        <div class="uploaded_image">

                                            <div class="gallery_images_sample">
                                                @if(isset($gallery->images[0]) && !empty($gallery->images[0]))
                                                <img src="{{ \Illuminate\Support\Facades\Storage::url($gallery->images[0]->src) }}" alt="">
                                                @endif
                                                    @if(isset($gallery->images[1]) && !empty($gallery->images[1]))
                                                <img src="{{ \Illuminate\Support\Facades\Storage::url($gallery->images[1]->src) }}" alt="">
                                                    @endif
                                            </div>

                                            <a href="javascript:void(0)" data-galleryname="{{ $gallery->title }}" data-galleryid="{{ $gallery->id }}" class="btn btn-danger choose-item">
                                                @lang('site.choose_gallery')
                                            </a>

                                            @can('galleries.edit')
                                            <a href="{{ route('galleries.edit' , $gallery->id) }}" class="edit_gallery">
                                                <i class="far fa-pencil"></i>
                                            </a>
                                            @endcan



                                        @can('galleries.destroy')
                                            <a href="javascript:void(0)" class="remove_gallery">
                                                <i class="far fa-times"></i>
                                            </a>



                                            {{--Deleting Form--}}
                                            <form
                                                action="{{ route('galleries.destroy' , $gallery->id) }}"
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


        $('.choose-item').click(function () {
            let galleryId = $(this).data('galleryid');
            let galleryName = $(this).data('galleryname');


            window.opener.$('#input_gallery').val(galleryId);
            window.opener.$('#showing_gallery_name').text(galleryName);


            self.close();
        });

    </script>

    <script>
        $(document).on('click', '.remove_gallery', function () {

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
