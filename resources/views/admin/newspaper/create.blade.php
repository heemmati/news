@extends ('admin.layout.master')


@section('content')
    <div class="content">


        <div class="page-header">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.panel') }}">داشبورد</a>
                    </li>

                    <li class="breadcrumb-item">
                        <a href="">ارسال خبرنامه جدید</a>
                    </li>


                </ol>
            </nav>
        </div>


        <div class="row">
            <div class="col-md-12">


                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">ارسال خبرنامه جدید</h6>


                        <form method="POST" action="{{ route('newspapers.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                @error('title')
                                <small id="emailHelp" class="text text-danger font-weight-bolder">
                                    {{ $message }}
                                </small>
                                @enderror
                                <label for="">عنوان خبرنامه را وارد کنید</label>
                                <input type="text" name="title" class="form-control"
                                       placeholder="عنوان خبرنامه را وارد کنید" value="{{ old('title') }}"
                                       required>
                            </div>


                            <div class="form-group">
                                @error('body')
                                <small id="emailHelp" class="text text-danger font-weight-bolder">
                                    {{ $message }}
                                </small>
                                @enderror

                                <label>
                                    متن خبرنامه را بنویسید

                                        <small class="text-danger">*</small>

                                </label>
                                <textarea name="body" id="body" class="form-control" cols="30"
                                          rows="5">{{ old('body') }}</textarea>
                                <small class="form-text text-muted">
                                    متن خبرنامه را بنویسید
                                </small>
                            </div>

                            <div class="form-group wd-xs-300">
                                @error('users')
                                <small id="emailHelp" class="text text-danger font-weight-bolder">
                                    {{ $message }}
                                </small>
                                @enderror

                                <label>
                                    لیست کاربران را وارد کنید
                                    @if(isset($important))
                                        <small class="text-danger">*</small>
                                    @endif
                                </label>

                                <select class=" form-control" name="users[]" required multiple style="height: 150px">

                                    @foreach($users as $user)
                                        <option value="{{ $user->email }}">{{ $user->email }}</option>
                                    @endforeach

                                </select>



                                <small class="form-text text-muted">
                                    لیست کاربران را وارد کنید
                                    </small>

                            </div>

                            <div class="form-group">
                                <div class="custom-control custom-checkbox custom-checkbox-dark">
                                    <input   name="all" type="checkbox" class="custom-control-input" id="customCheck1" >
                                    <label class="custom-control-label" for="customCheck1">انتخاب همه اعضا</label>
                                </div>
                            </div>


                            <button type="submit" class="btn btn-primary">ارسال خبرنامه جدید</button>
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
