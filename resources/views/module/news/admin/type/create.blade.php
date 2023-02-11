@extends ('admin.layout.master2')


@section('content')


        <div class="row">
            <div class="col-md-12">


                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">ایجاد نوع خبر جدید</h6>


                        <form method="POST" action="{{ route('article-types.store') }}" enctype="multipart/form-data">
                            @csrf

                            @include('error.forms')

                            {{--Title--}}
                            <div class="form-group">
                                @error('title')
                                <small id="emailHelp" class="text text-danger font-weight-bolder">
                                    {{ $message }}
                                </small>
                                @enderror
                                <label for="">عنوان نوع خبر را وارد کنید</label>
                                <input type="text"
                                       name="title"
                                       class="form-control"
                                       placeholder="عنوان نوع خبر را وارد کنید"
                                       required>
                                <small class="counter_small"></small>

                            </div>


                            {{--En title--}}
                            <div class="form-group">
                                @error('entitle')
                                <small id="emailHelp" class="text text-danger font-weight-bolder">
                                    {{ $message }}
                                </small>
                                @enderror
                                <label for="">عنوان انگلیسی  نوع خبر را وارد کنید</label>
                                <input type="text"
                                       name="entitle"
                                       class="form-control"
                                       placeholder="عنوان انگلیسی نوع خبر را وارد کنید"
                                       required>
                                <small class="counter_small"></small>

                            </div>



                            <div class="form-group">

                                @error('code')
                                <small id="emailHelp" class="text text-danger font-weight-bolder">
                                    {{ $message }}
                                </small>
                                @enderror

                                <label for=""> کد برنامه نویسی نوع خبر را وارد کنید</label>

                                <input type="text"
                                       name="code"
                                       class="form-control"
                                       placeholder="کد برنامه نویسی نوع خبر را وارد کنید"
                                       required>

                                <small class="counter_small"></small>

                            </div>



                            <button type="submit" class="btn btn-primary">ایجاد نوع خبر جدید</button>
                        </form>

                    </div>
                </div>


            </div>
        </div>



@endsection

