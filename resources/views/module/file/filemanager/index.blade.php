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
                        <a href=""> @lang('site.choose_a_file') </a>
                    </li>


                </ol>
            </nav>
        </div>


        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">@lang('site.upload_new_file')</h6>


                        <form method="POST" action="{{ route('files.store') }}" enctype="multipart/form-data">
                            @csrf

                            @include('error.forms')

                            {{-- Title --}}
                            <x-form.text require="1"  value="{{ old('title') }}" type="{{ __('site.files_singular') }}" name="title" namefa="{{ __('site.title') }}"></x-form.text>


                            <x-form.text require="1"  value="{{ old('entitle') }}" type="{{ __('site.files_singular') }}" name="entitle" namefa="{{ __('site.entitle') }}"></x-form.text>



                            {{-- Alt --}}
                            <x-form.text require="1" value="{{ old('alt') }}" type="{{ __('site.files_singular') }}" name="alt" namefa="{{ __('site.alt') }}"></x-form.text>


                            {{--                            <x-form.image require="1" type="{{ __('site.files_singular') }}" name="screenshot" namefa="{{ __('site.screenshot') }}"></x-form.image>--}}

                            <x-form.video require="1" value="{{ old('src') }}" type="{{ __('site.files_singular') }}" name="src" namefa="{{ __('site.upload') }}"></x-form.video>


                            <button type="submit" class="btn btn-primary">@lang('site.upload_new_file')</button>
                        </form>

                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">@lang('site.files_search')</h6>
                        <form action="{{ route('file.filemanager') }}" method="GET">
                            <div class="row">
                                <div class="col-12 col-md-4">
                                    <x-form.text name="title" namefa="{{ __('site.title') }}"
                                                 value="{{ !empty($filtered['title']) ? $filtered['title'] : '' }}"

                                                 type="{{ __('routes.files_singular') }}" require="0"></x-form.text>
                                </div>
                                <div class="col-12 col-md-4">
                                    <x-form.text name="etitle" namefa="{{ __('site.entitle') }}"
                                                 value="{{ !empty($filtered['entitle']) ? $filtered['entitle'] : '' }}"
                                                 type="{{ __('routes.files_singular') }}" require="0"></x-form.text>
                                </div>
                                <div class="col-12 col-md-4">
                                    <x-form.text name="alt" namefa="{{ __('site.alt') }}"
                                                 value="{{ !empty($filtered['alt']) ? $filtered['alt'] : '' }}"
                                                 type="{{ __('routes.files_singular') }}" require="0"></x-form.text>
                                </div>
                                <div class="col-12 col-md-4">
                                    <x-form.text name="start_date" kind="date" namefa="{{ __('site.start_date_upload') }}"
                                                 value="{{ !empty($filtered['start_date']) ? $filtered['start_date'] : '' }}"
                                                 type="{{ __('routes.files_singular') }}" require="0"></x-form.text>
                                </div>
                                <div class="col-12 col-md-4">
                                    <x-form.text name="end_date" kind="date" namefa="{{ __('site.end_date_upload') }}"
                                                 value="{{ !empty($filtered['end_date']) ? $filtered['end_date'] : '' }}"
                                                 type="{{ __('routes.files_singular') }}" require="0"></x-form.text>
                                </div>
                                <div class="col-12 col-md-4">
                                    <button type="submit" class="btn btn-danger">{{ __('routes.search') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>


                @if(isset($files) && !empty($files))


                    <div class="card">
                        <div class="card-body">


                            <div class="row">

                                @foreach($files as $file)
                                    <div class="col-md-3">
                                        <div class="uploaded_image">
                                            <a class="choose-item btn btn-danger"
                                               data-fileid="{{$file->id}}"
                                               data-filename="{{$file->title}}"
                                               data-filemanager="{{\Illuminate\Support\Facades\Storage::url($file->src) }}"

                                               href="javascript:void(0)">
                                                <i class="far fa-download"></i>
                                                {{ $file->title }}
                                            </a>

                                            <a href="javascript:void(0)" class="remove_file">
                                                <i class="far fa-times"></i>
                                            </a>

                                            <a href="{{ route('files.edit' , $file->id) }}" class="edit_file">
                                                <i class="far fa-pencil"></i>
                                            </a>

                                            {{--Deleting Form--}}
                                            <form
                                                action="{{ route('files.destroy' , $file->id) }}"
                                                method="POST" style="display: none">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn-default"></button>
                                            </form>
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
        $("input.tagsinput-example").tagsinput('items');


        $('.choose-item').click(function () {
            let fileSrc = $(this).data('filemanager');
            let fileId = $(this).data('fileid');
            let fileName = $(this).data('filename');




            window.opener.$('#input_file').val(fileId);
            window.opener.$('#showing_file_name').text(fileName);
            window.opener.$('#showing_file').find('source').attr('src' , fileSrc);



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
