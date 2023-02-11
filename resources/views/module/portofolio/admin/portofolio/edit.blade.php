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
                            ویرایش نمونه کار {{ $portofolio->title }}
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
                            ویرایش نمونه کار {{ $portofolio->title }}
                        </h6>


                        <form method="POST" action="{{ route('portofolios.update' , $portofolio->id) }}" enctype="multipart/form-data">
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
                                        <label for="">عنوان نمونه کار را وارد کنید</label>
                                        <input type="text" name="title" class="form-control"
                                               placeholder="عنوان نمونه کار را وارد کنید"
                                               value="{{ $portofolio->title }}"
                                               required>
                                        <small class="counter_small"></small>

                                    </div>


                                    <div class="form-group">
                                        @error('link')
                                        <small id="emailHelp" class="text text-danger font-weight-bolder">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                        <label for="">لینک خارجی نمونه کار را وارد کنید</label>
                                        <input type="text" name="link" class="form-control"
                                               placeholder="لینک خارجی نمونه کار را وارد کنید"
                                               value="{{ $portofolio->link }}"
                                               required>
                                        <small class="counter_small"></small>

                                    </div>


                                    <div class="form-group">

                                        @error('categories')
                                        <small id="emailHelp" class="text text-danger font-weight-bolder">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                        <label for="">دسته بندی را وارد کنید </label>
                                        @if(isset($categories) && !empty($categories))
                                            <select name="categories[]" id="" class="form-control select_js" multiple
                                                    required>
                                                <option value="0">
                                                    بدون دسته بندی
                                                </option>
                                                @foreach($categories as $category)
                                                    <option value="{{ $category->id }}" {{ $portofolio->category->id == $category->id ? 'selected' : '' }}>
                                                        {{ $category->title }}
                                                    </option>
                                                @endforeach
                                            </select>

                                        @else
                                            <p class="alert alert-warning">
                                                ابتدا دسته بندی برای نمونه کار وارد کنید!
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
                                        <label for="">عنوان انگلیسی نمونه کار را وارد کنید</label>
                                        <input type="text" name="entitle" class="form-control"
                                               placeholder="عنوان انگلیسی نمونه کار را وارد کنید"
                                               value="{{ $portofolio->entitle }}"
                                               required>
                                        <small class="counter_small"></small>

                                    </div>


                                    <x-form.tag :tags="$portofolio->tags"></x-form.tag>

                                    {{-- Description --}}
                                    <div class="form-group">
                                        @error('description')
                                        <small id="emailHelp" class="text text-danger font-weight-bolder">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                        <label for=""> توضیحات کوتاه نمونه کار را وارد کنید </label>

                                        <textarea class="form-control"
                                                  name="description"
                                                  id="" cols="30" rows="10"
                                                  placeholder="توضیحات کوتاه نمونه کار را وارد کنید">
                                       {{ $portofolio->description }}

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
                                <label for=""> متن کامل نمونه کار را وارد کنید </label>

                                <textarea class="form-control body"

                                          name="body"
                                          id="" cols="30" rows="10"
                                          placeholder="متن کامل نمونه کار را وارد کنید">
                                     {{ $portofolio->body }}

                                </textarea>
                                <small class="counter_small"></small>
                            </div>


                            <hr>
                            <h5>اطلاعات تکمیلی نمونه کار</h5>
                            <div class="row">
                                <div class="col-12 col-md-4">
                                    <div class="form-group">
                                        @error('length')
                                        <small id="emailHelp" class="text text-danger font-weight-bolder">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                        <label for="">طول مدت انجام پروژه را وارد کنید</label>
                                        <input type="text" name="length" class="form-control"
                                               placeholder="طول مدت انجام پروژه را وارد کنید"
                                               value="{{ $portofolio->length }}"
                                        >
                                        <small class="counter_small"></small>

                                    </div>

                                </div>

                                <div class="col-12 col-md-4">
                                    <div class="form-group">
                                        @error('customer_name')
                                        <small id="emailHelp" class="text text-danger font-weight-bolder">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                        <label for="">نام کارفرما</label>
                                        <input type="text" name="customer_name" class="form-control"
                                               placeholder="نام کارفرما را وارد کنید"
                                               value="{{ $portofolio->customer_name }}"
                                        >
                                        <small class="counter_small"></small>

                                    </div>

                                </div>


                                <div class="col-12 col-md-4">
                                    <div class="form-group">
                                        @error('customer_mobile')
                                        <small id="emailHelp" class="text text-danger font-weight-bolder">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                        <label for="">راه ارتباطی با کارفرما</label>
                                        <input type="text" name="customer_mobile" class="form-control"
                                               placeholder="راه ارتباطی با کارفرما را وارد کنید"
                                               value="{{ $portofolio->customer_mobile }}"
                                        >
                                        <small class="counter_small"></small>

                                    </div>

                                </div>

                                <div class="col-12 col-md-12">
                                    <div class="form-group">
                                        @error('customer_comment')
                                        <small id="emailHelp" class="text text-danger font-weight-bolder">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                        <label for="">دیدگاه کارفرما درباره سیستم طراحی شده</label>

                                        <textarea class="form-control" name="customer_comment" placeholder="دیدگاه کارفرما درباره سیستم طراحی شده" id="" cols="30" rows="10">

                                      {{ $portofolio->customer_comment }}

                                        </textarea>

                                        <small class="counter_small"></small>

                                    </div>

                                </div>

                                <div class="col-12 col-md-4">
                                    <div class="form-group">
                                        @error('customer_rate')
                                        <small id="emailHelp" class="text text-danger font-weight-bolder">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                        <label for="">امتیاز کارفرما به سایت از 5 </label>
                                        <input type="number" min="1" max="5" name="customer_rate" class="form-control"
                                               placeholder="امتیاز کارفرما به سایت از 5"
                                               value="{{ $portofolio->customer_rate }}"
                                        >
                                        <small class="counter_small"></small>


                                    </div>

                                </div>

                                <div class="col-12 col-md-4">
                                    <div class="form-group">
                                        @error('done_date')
                                        <small id="emailHelp" class="text text-danger font-weight-bolder">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                        <label for="">تاریخ اتمام پروژه</label>
                                        <input type="date" name="done_date" class="form-control"
                                               placeholder="تاریخ اتمام پروژه را وارد کنید"
                                               value="{{ $portofolio->done_date }}"
                                        >
                                        <small class="counter_small"></small>

                                    </div>

                                </div>

                                <div class="col-12 col-md-4">
                                    <div class="form-group">
                                        @error('workerCount')
                                        <small id="emailHelp" class="text text-danger font-weight-bolder">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                        <label for="">تعداد نیروی کار</label>
                                        <input type="number" min="1" name="workerCount" class="form-control"
                                               placeholder="تعداد نیروی کار پروژه را وارد کنید"
                                               value="{{ $portofolio->workerCount }}"
                                        >
                                        <small class="counter_small"></small>

                                    </div>

                                </div>


                            </div>
                            <hr>


                            <hr>
                            <h5>تنظیمات نمایشی نمونه کار</h5>
                            <div class="row">
                                <div class="col-12 col-md-3">
                                    <div class="form-group">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" name="comments" class="custom-control-input"
                                                   id="comment1" checked>
                                            <label class="custom-control-label" for="comment1">
                                                نمایش نظرات
                                            </label>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-12 col-md-3">
                                    <div class="form-group">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" name="image_rss" class="custom-control-input"
                                                   id="image_rss1">
                                            <label class="custom-control-label" for="image_rss1">
                                                نمایش تصویر در RSS
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 col-md-3">
                                    <div class="form-group">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" name="most_comments" class="custom-control-input"
                                                   id="most_comments1">
                                            <label class="custom-control-label" for="most_comments1">
                                                نمایش در پر بحث ترین ها
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 col-md-3">
                                    <div class="form-group">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" name="most_rated" class="custom-control-input"
                                                   id="most_rated1">
                                            <label class="custom-control-label" for="most_rated1">
                                                نمایش در پر امتیاز ها
                                            </label>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-12 col-md-3">
                                    <div class="form-group">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" name="image_default" class="custom-control-input"
                                                   id="image1" checked>
                                            <label class="custom-control-label" for="image1">
                                                نمایش تصویر پیش فرض
                                            </label>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-12 col-md-3">
                                    <div class="form-group">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" name="most_viewed" class="custom-control-input"
                                                   id="most_viewed1">
                                            <label class="custom-control-label" for="most_viewed1">
                                                نمایش در پر بیننده ترین ها
                                            </label>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-12 col-md-3">
                                    <div class="form-group">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" name="view_count" class="custom-control-input"
                                                   id="view_count1" checked>
                                            <label class="custom-control-label" for="view_count1">
                                                نمایش تعداد بازدید
                                            </label>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-12 col-md-3">
                                    <div class="form-group">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" name="social" class="custom-control-input"
                                                   id="social1" checked>
                                            <label class="custom-control-label" for="social1">
                                                نمایش دکمه های اشتراک گزاری
                                            </label>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-12 col-md-3">
                                    <div class="form-group">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" name="rss" class="custom-control-input" id="rss1">
                                            <label class="custom-control-label" for="rss1">
                                                نمایش در RSS
                                            </label>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <hr>


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

                                        <input type="hidden" name="image">
                                        <button id="image_button" class="btn btn-warning">آپلود و یا الصاق تصویر
                                        </button>

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

                                        <input type="hidden" name="video">
                                        <button class="btn btn-danger">آپلود و یا الصاق ویدیو</button>

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

                                        <input type="hidden" name="file">
                                        <button class="btn btn-info">آپلود و یا الصاق فایل</button>

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

                                        <input type="hidden" name="gallery">
                                        <button class="btn btn-dribbble"> الصاق گالری</button>

                                    </div>
                                </div>

                            </div>


                            <div class="row">
                                <div class="col-12 col-md-12">
                                    <div class="form-group">
                                        @error('writer')
                                        <small id="emailHelp" class="text text-danger font-weight-bolder">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                        <label for=""> تاریخ انتشار را وارد کنید </label>

                                        <input type="date" class="form-control" name="created_at"
                                               placeholder="تاریخ انتشار را وارد کنید">

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
                        :items="\App\Utility\Status::items()" :value="$portofolio->status" type="{{ __('site.portofolios_singular') }} "
                        require="0" multiple="0"></x-form.utility>




                    </div>
                </div>
                @endcan
                @endif

                            <button type="submit" class="btn btn-primary">ویرایش نمونه کار</button>
                        </form>

                    </div>
                </div>


            </div>
        </div>


    </div>
@endsection

