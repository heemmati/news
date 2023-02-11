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
                        <a href="">ویرایش خدمت {{ $service->title }}</a>
                    </li>
                </ol>
            </nav>
        </div>



        <div class="row">
            <div class="col-md-12">


                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">
                            ویرایش خدمات  {{ $service->title }}
                        </h6>


                        <form method="POST" action="{{ route('services.update' , $service->id ) }}"
                              enctype="multipart/form-data">
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
                                        <label for="">عنوان خدمات را وارد کنید</label>
                                        <input type="text" name="title" class="form-control"
                                               placeholder="عنوان خدمات را وارد کنید"
                                               value="{{ $service->title }}"
                                               >
                                        <small class="counter_small"></small>

                                    </div>

                                    <div class="form-group">
                                        @error('manager_name')
                                        <small id="emailHelp" class="text text-danger font-weight-bolder">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                        <label for="">نام مدیر بخش را وارد کنید</label>
                                        <input type="text" name="manager_name" class="form-control"
                                               placeholder="نام مدیر بخش را وارد کنید"
                                               value="{{ $service->manager_name }}"
                                        >
                                        <small class="counter_small"></small>

                                    </div>


                                    <div class="form-group">
                                        @error('internal_phone')
                                        <small id="emailHelp" class="text text-danger font-weight-bolder">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                        <label for="">تلفن داخلی بخش را وارد کنید</label>
                                        <input type="text" name="internal_phone" class="form-control"
                                               placeholder="تلفن داخلی بخش را وارد کنید"
                                               value="{{ $service->internal_phone }}"
                                        >
                                        <small class="counter_small"></small>

                                    </div>


                                    <div class="form-group">

                                        @error('categories')
                                        <small id="emailHelp" class="text text-danger font-weight-bolder">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                        <label for="">پدر خدمات را وارد کنید </label>
                                        @if(isset($services) && !empty($services))
                                            <select name="parent_id" id="" class="form-control select_js" required>
                                                <option value="0">
                                                    مادر
                                                </option>
                                                @foreach($services as $service2)
                                                    <option value="{{ $service2->id }}" {{ $service->parent_id == $service2->id ? 'selected' : '' }}>
                                                        {{ $service2->title }}
                                                    </option>
                                                @endforeach
                                            </select>

                                        @else
                                            <p class="alert alert-warning">
                                                ابتدا  برای خدمات وارد کنید!
                                            </p>
                                        @endif
                                    </div>


                                </div>

                                <div class="col-12 col-md-6">
                                    {{--En title--}}
                                    <div class="form-group">
                                        @error('entitle')
                                        <small id="emailHelp" class="text text-danger font-weight-bolder">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                        <label for="">عنوان انگلیسی خدمات را وارد کنید</label>
                                        <input type="text" name="entitle" class="form-control"
                                               placeholder="عنوان انگلیسی خدمات را وارد کنید"
                                               value="{{ $service->entitle }}"
                                               required>
                                        <small class="counter_small"></small>

                                    </div>


                                    <div class="form-group">
                                        @error('email')
                                        <small id="emailHelp" class="text text-danger font-weight-bolder">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                        <label for="">ایمیل بخش را وارد کنید</label>
                                        <input type="text" name="email" class="form-control"
                                               placeholder="ایمیل بخش را وارد کنید"
                                               value="{{ $service->email }}"
                                        >
                                        <small class="counter_small"></small>

                                    </div>


                                    <x-form.tag></x-form.tag>

                                    {{-- Description --}}
                                    <div class="form-group">
                                        @error('description')
                                        <small id="emailHelp" class="text text-danger font-weight-bolder">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                        <label for=""> توضیحات کوتاه خدمات را وارد کنید </label>

                                        <textarea class="form-control"
                                                  name="description"
                                                  id="" cols="30" rows="10"
                                                  placeholder="توضیحات کوتاه خدمات را وارد کنید">
                                        {{ $service->description }}

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
                                <label for=""> متن کامل خدمات را وارد کنید </label>

                                <textarea class="form-control body"

                                          name="body"
                                          id="" cols="30" rows="10"
                                          placeholder="متن کامل خدمات را وارد کنید">

                {{ $service->body }}



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
                                        <label for=""> تصویر پیش فرض </label>
                                        <br>

                                        <input type="hidden" name="image" id="input_image">
                                        <button id="image_button" role="button" type="button" class="btn btn-warning">
                                            آپلود و یا الصاق تصویر
                                        </button>
                                        <img src="" class="showing_image" id="showing_image" alt="">


                                    </div>
                                </div>

                                <div class="col-12 col-md-3">
                                    <div class="form-group">
                                        @error('image')
                                        <small id="emailHelp" class="text text-danger font-weight-bolder">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                        <label for=""> ویدیو </label>
                                        <br>

                                        <input type="hidden" name="video" id="input_video">
                                        <button id="video_button" role="button" type="button" class="btn btn-danger">
                                            آپلود و یا الصاق ویدیو
                                        </button>

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
                                        <label for=""> پادکست </label>
                                        <br>

                                        <input type="hidden" name="podcast" id="input_podcast">
                                        <button id="podcast_button" role="button" type="button" class="btn btn-info">
                                            آپلود و یا الصاق پادکست
                                        </button>
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
                                        <label for=""> فایل </label>
                                        <br>

                                        <input type="hidden" name="file" id="input_file">
                                        <button id="file_button" role="button" type="button" class="btn btn-info">آپلود
                                            و یا الصاق فایل
                                        </button>
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
                                        <label for=""> گالری </label>
                                        <br>

                                        <input type="hidden" name="gallery" id="input_gallery">
                                        <button id="gallery_button" role="button" type="button"
                                                class="btn btn-dribbble"> الصاق گالری
                                        </button>
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
                        :items="\App\Utility\Status::items()" :value="$service->status" type="{{ __('site.services_singular') }} "
                        require="0" multiple="0"></x-form.utility>




                    </div>
                </div>
                @endcan
                @endif


                            <button type="submit" class="btn btn-primary">ویرایش خدمات</button>
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
