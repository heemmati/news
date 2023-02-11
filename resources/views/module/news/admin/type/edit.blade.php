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

                        <a href="">
                            ویرایش نوع خبر
                            {{ $type->title }}
                        </a>
                    </li>


                </ol>
            </nav>
        </div>


        <div class="row">
            <div class="col-md-12">


                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">
                            ویرایش نوع خبر

                            {{ $type->title }}
                        </h6>


                        <form method="POST" action="{{ route('article-types.update' , $type->id) }}"
                              enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')

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
                                       value="{{ $type->title }}"
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
                                       value="{{ $type->entitle }}"
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
                                       value="{{ $type->code }}"
                                       class="form-control"
                                       placeholder="کد برنامه نویسی نوع خبر را وارد کنید"
                                       required>

                                <small class="counter_small"></small>

                            </div>



                            <button type="submit" class="btn btn-primary">
                                ویرایش نوع خبر
                            </button>
                        </form>

                    </div>
                </div>


            </div>
        </div>


    </div>
@endsection

@section('scripts')





@endsection
