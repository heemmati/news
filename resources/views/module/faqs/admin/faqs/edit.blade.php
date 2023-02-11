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

                            ویرایش پرسش و پاسخ

                        </a>
                    </li>
                </ol>
            </nav>
        </div>


        <div class="row">
            <div class="col-md-12">


                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">ویرایش پرسش و پاسخ</h6>


                        <form method="POST" action="{{ route('faqs.update' , $faq->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')

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
                                        <label for="">عنوان پرسش و پاسخ را وارد کنید</label>
                                        <input type="text" name="title" class="form-control"
                                               placeholder="عنوان پرسش و پاسخ را وارد کنید"
                                               value="{{ $faq->title }}"
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
                                        <label for="">عنوان انگلیسی پرسش و پاسخ را وارد کنید</label>
                                        <input type="text" name="entitle" class="form-control"
                                               placeholder="عنوان انگلیسی پرسش و پاسخ را وارد کنید"
                                               value="{{ $faq->entitle }}"
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
                                        <label for=""> توضیحات کوتاه پرسش و پاسخ را وارد کنید </label>

                                        <textarea class="form-control"
                                                  name="description"
                                                  id="" cols="30" rows="10"
                                                  placeholder="توضیحات کوتاه پرسش و پاسخ را وارد کنید">

                                         {{ $faq->description }}
                                        </textarea>
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
                                <label for=""> متن کامل پرسش و پاسخ را وارد کنید </label>

                                <textarea class="form-control body"

                                          name="body"
                                          id="" cols="30" rows="10"
                                          placeholder="متن کامل پرسش و پاسخ را وارد کنید">
                                     {{ $faq->description }}
                                </textarea>
                                <small class="counter_small"></small>
                            </div>






                            <h5> چند رسانه ای </h5>
                            <div class="row">
                                <div class="col-12 col-md-3">
                                    <div class="form-group">
                                        @error('image')
                                        <small id="emailHelp" class="text text-danger font-weight-bolder">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                        <label for=""> تصویر پیش فرض  </label>
                                        <br>

                                        <input type="hidden" name="image"  id="input_image"  >
                                        <button id="image_button"  role="button" type="button" class="btn btn-warning">آپلود و یا الصاق  تصویر</button>
                                        <img src=""  class="showing_image" id="showing_image" alt="">


                                    </div>
                                </div>

                                <div class="col-12 col-md-3">
                                    <div class="form-group">
                                        @error('image')
                                        <small id="emailHelp" class="text text-danger font-weight-bolder">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                        <label for=""> ویدیو  </label>
                                        <br>

                                        <input type="hidden" name="video" id="input_video">
                                        <button id="video_button" role="button" type="button" class="btn btn-danger">آپلود و یا الصاق  ویدیو</button>

                                        {{--                                        <video  width="100px"  height="100px" id="showing_video" controls>--}}
                                        {{--                                            <source src="">--}}
                                        {{--                                        </video>--}}
                                        <h6>
                                            <span id="showing_video_name">

                                            </span>

                                        </h6>
                                    </div>
                                </div>


                                <div class="col-12 col-md-3">
                                    <div class="form-group">
                                        @error('podcast')
                                        <small id="emailHelp" class="text text-danger font-weight-bolder">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                        <label for="">  پادکست  </label>
                                        <br>

                                        <input type="hidden" name="podcast" id="input_podcast" >
                                        <button id="podcast_button" role="button" type="button"  class="btn btn-info">آپلود و یا الصاق  پادکست</button>
                                        <h6>
                                            <span id="showing_podcast_name">

                                            </span>

                                        </h6>
                                    </div>
                                </div>


                                <div class="col-12 col-md-3">
                                    <div class="form-group">
                                        @error('image')
                                        <small id="emailHelp" class="text text-danger font-weight-bolder">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                        <label for="">  فایل </label>
                                        <br>

                                        <input type="hidden" name="file" id="input_file" >
                                        <button id="file_button" role="button" type="button"  class="btn btn-info">آپلود و یا الصاق  فایل</button>
                                        <h6>
                                            <span id="showing_file_name">

                                            </span>

                                        </h6>
                                    </div>
                                </div>


                                <div class="col-12 col-md-3">
                                    <div class="form-group">
                                        @error('gallery')
                                        <small id="emailHelp" class="text text-danger font-weight-bolder">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                        <label for="">  گالری </label>
                                        <br>

                                        <input type="hidden" name="gallery" id="input_gallery">
                                        <button id="gallery_button"  role="button" type="button" class="btn btn-dribbble"> الصاق گالری </button>
                                        <h6>
                                            <span id="showing_gallery_name">

                                            </span>

                                        </h6>
                                    </div>
                                </div>

                            </div>


                            @if(\App\Utility\Acl::isManager(auth()->id()))
                @can('panel.change.status')
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                            {{ __('site.status_change') }}
                        </h5>


                        <x-form.utility name="status" namefa="{{ __('site.status') }}"
                        :items="\App\Utility\Status::items()" :value="$faq->status" type="{{ __('site.faqs_singular') }} "
                        require="0" multiple="0"></x-form.utility>




                    </div>
                </div>
                @endcan
                @endif



                            <button type="submit" class="btn btn-primary">ایجاد پرسش و پاسخ جدید</button>
                        </form>

                    </div>
                </div>


            </div>
        </div>


    </div>
@endsection

@section('scripts')

    <script>

        $("input.tagsinput-example").tagsinput('items');

    </script>

@endsection
