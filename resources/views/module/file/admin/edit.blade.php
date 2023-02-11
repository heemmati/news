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
                        <a href=""> @lang('site.files_management') </a>
                    </li>


                </ol>
            </nav>
        </div>


        <div class="row">
            <div class="col-md-12">


                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">@lang('site.file_update')</h6>
                        <form method="POST" action="{{ route('files.update' , $file->id) }}"
                              enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')

                            @include('error.forms')

                            {{-- Title --}}
                            <x-form.text require="1" type="{{ __('site.files_singular') }}" name="title" namefa="{{ __('site.title') }}"
                                         :value="$file->title"></x-form.text>


                            <x-form.text require="0" type="{{ __('site.files_singular') }}" name="entitle" namefa="{{ __('site.entitle') }}"
                                         :value="$file->entitle"></x-form.text>


                            {{-- Alt --}}
                            <x-form.text require="1" type="{{ __('site.files_singular') }}" name="alt" namefa="{{ __('site.alt') }}"
                                         :value="$file->alt"></x-form.text>


                            <div class="file_single_show">
                                <a class="btn btn-danger"
                                   href="{{ \Illuminate\Support\Facades\Storage::url($file->src) }}">
                                    <i class="far fa-download"></i>
                                    {{ $file->title }}
                                </a>
                            </div>


                            <button type="submit" class="btn btn-primary">@lang('site.file_update')</button>
                        </form>

                    </div>
                </div>



            </div>
        </div>


    </div>
@endsection

@section('scripts')
    <script>

        $(document).on('click', '.remove_file', function () {

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
