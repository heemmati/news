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
                        <a href="">@lang('site.create_new_theme')</a>
                    </li>


                </ol>
            </nav>
        </div>


        <div class="row">
            <div class="col-md-12">


                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">@lang('site.create_new_theme')</h6>

                        <form method="POST" action="{{ route('themes.store') }}" enctype="multipart/form-data">
                            @csrf

                            @include('error.forms')


                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        @error('title')
                                        <small id="emailHelp" class="text text-danger font-weight-bolder">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                        <label for="">@lang('site.enter_theme_title')</label>

                                        <input type="text" name="title" class="form-control"
                                               value="{{ old('title') }}"
                                               placeholder="@lang('site.enter_theme_title')"
                                               required>
                                    </div>
                                </div>

                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        @error('path')
                                        <small id="emailHelp" class="text text-danger font-weight-bolder">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                        <label for="">@lang('site.enter_theme_path')</label>

                                        <input type="text" name="path" class="form-control"
                                               value="{{ old('path') }}"
                                               placeholder="@lang('site.enter_theme_path')"
                                               required>
                                    </div>
                                </div>
                            </div>











                            <button type="submit" class="btn btn-primary">@lang('site.create_new_theme')</button>
                        </form>

                    </div>
                </div>


            </div>
        </div>


    </div>
@endsection

@section('scripts')
    <script>
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
@endsection
