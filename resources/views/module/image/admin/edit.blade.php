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
                        <a href=""> @lang('site.image_management') </a>
                    </li>


                </ol>
            </nav>
        </div>


        <div class="row">
            <div class="col-md-12">


                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">  @lang('site.images_edit') </h6>


                        <form method="POST" action="{{ route('images.update' , $image->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')

                            @include('error.forms')

                            {{-- Title --}}
                            <x-form.text require="1" type="{{ __('site.images__singular') }}" name="title" namefa="{{ __('site.title') }}" :value="$image->title "></x-form.text>

                            {{--                            --}}{{-- Title --}}
                            {{--                            <x-form.text require="0" type="{{ __('site.images__singular')}}" name="entitle" namefa="{{ __('site.entitle') }}" :value="$image->entitle"></x-form.text>--}}

                            {{-- Alt --}}
                            <x-form.text require="1" type="{{ __('site.images__singular') }}" name="alt" namefa="{{ __('site.alt') }}" :value="$image->alt "></x-form.text>

                            <div class="show_single_image">
                                <a href="{{\Illuminate\Support\Facades\Storage::url($image->src)}}">
                                    <img src="{{\Illuminate\Support\Facades\Storage::url($image->src)}}" alt="">
                                </a>
                            </div>

                            <button type="submit" class="btn btn-primary">@lang('site.images_edit')</button>

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

                                            <a href="{{ \Illuminate\Support\Facades\Storage::url($image->src) }}">
                                                <img src="{{ \Illuminate\Support\Facades\Storage::url($image->src) }}" alt="{{ $image->alt }}" title="{{ $image->title }}">
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

                                                <form
                                                    action="{{ route('images.destroy' , $image->id) }}"
                                                    method="POST" style="display: none">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn-default"></button>
                                                </form>

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

        $('a').click(function () {
            window.opener.setValue(true);
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
