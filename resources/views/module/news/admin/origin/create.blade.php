@extends ('admin.layout.master2')


@section('content')


        <div class="row">
            <div class="col-md-12">


                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">ایجاد منبع خبر جدید</h6>


                        <form method="POST" action="{{ route('article-origins.store') }}" enctype="multipart/form-data">
                            @csrf

                            @include('error.forms')

                            <div class="row">
                                <div class="col-12 col-md-6">
                                    {{--Title--}}
                                    <div class="form-group">
                                        @error('title')
                                        <small id="emailHelp" class="text text-danger font-weight-bolder">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                        <label for="">عنوان منبع خبر را وارد کنید</label>
                                        <input type="text"
                                               name="title"
                                               class="form-control"
                                               placeholder="عنوان منبع خبر را وارد کنید"
                                               value="{{ old('link') }}"
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
                                        <label for="">عنوان انگلیسی  منبع خبر را وارد کنید</label>
                                        <input type="text"
                                               name="entitle"
                                               class="form-control"
                                               placeholder="عنوان انگلیسی منبع خبر را وارد کنید"
                                               value="{{ old('entitle') }}"
                                        >
                                        <small class="counter_small"></small>

                                    </div>


                                    {{--Link--}}
                                    <div class="form-group">
                                        @error('link')
                                        <small id="emailHelp" class="text text-danger font-weight-bolder">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                        <label for="">لینک منبع خبر را وارد کنید</label>
                                        <input type="url"
                                               name="link"
                                               class="form-control"
                                               value="{{ old('link') }}"
                                               placeholder="لینک منبع خبر را وارد کنید"
                                               required>
                                        <small class="counter_small"></small>

                                    </div>
                                </div>

                                <div class="col-12 col-md-6">
                                    {{-- Description --}}
                                    <div class="form-group">
                                        @error('description')
                                        <small id="emailHelp" class="text text-danger font-weight-bolder">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                        <label for=""> توضیحات کوتاه منبع خبر را وارد کنید </label>

                                        <textarea class="form-control"
                                                  name="description"
                                                  id="" cols="30" rows="10"
                                                  placeholder="توضیحات کوتاه خبر را وارد کنید"></textarea>
                                        <small class="counter_small"></small>
                                    </div>


                                </div>
                            </div>

                            {{-- Body --}}
                            <div class="form-group">
                                @error('body')
                                <small id="emailHelp" class="text text-danger font-weight-bolder">
                                    {{ $message }}
                                </small>
                                @enderror
                                <label for=""> متن کامل منبع خبر را وارد کنید </label>

                                <textarea class="form-control body"

                                          name="body"
                                          id="" cols="30" rows="10"
                                          placeholder="متن کامل خبر را وارد کنید"></textarea>
                                <small class="counter_small"></small>
                            </div>



                            <div class="row">
                                <div class="col-12 col-md-12">
                                    <x-form.filemanager.image name="image" :value="old('image')" namefa="{{ __('site.origin_image') }}" ></x-form.filemanager.image>
                                                    </div>
                            </div>





                            <button type="submit" class="btn btn-primary">ایجاد منبع خبر جدید</button>
                        </form>

                    </div>
                </div>


            </div>
        </div>

@endsection
