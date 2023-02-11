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
                        <a href="">ویرایش دسته بندی </a>
                    </li>


                </ol>
            </nav>
        </div>






        <div class="row">
            <div class="col-md-12">


                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">ویرایش دسته بندی </h6>


                        <form method="POST" action="{{ route('categories.update' , $category->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')

                            @include('error.forms')




                            <div class="row">
                                <div class="col-md-6">
                                    {{--Title--}}
                                    <div class="form-group">
                                        @error('title')
                                        <small id="emailHelp" class="text text-danger font-weight-bolder">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                        <label for="">عنوان دسته بندی را وارد کنید</label>
                                        <input type="text" name="title" class="form-control"
                                               placeholder="عنوان دسته بندی را وارد کنید"
                                               value="{{ $category->title }}"
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
                                        <label for="">عنوان انگلیسی دسته بندی را وارد کنید</label>
                                        <input type="text" name="entitle" class="form-control"
                                               placeholder="عنوان انگلیسی دسته بندی را وارد کنید"
                                             value="{{ $category->entitle }}"
                                               required>
                                        <small class="counter_small"></small>
                                    </div>


                                    <div class="form-group">
                                        @error('parent')
                                        <small id="emailHelp" class="text text-danger font-weight-bolder">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                        <label for="">پدر دسته بندی را وارد کنید</label>

                                        <select name="parent_id" id="" class="form-control select2">
                                            <option value="0">مادر</option>
                                            @foreach($categories as $categoryi)
                                                <option value="{{ $categoryi->id }}" {{ $category->parent_id == $categoryi->id ? 'selected' : ''}}>{{ $categoryi->title }}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        @error('order')
                                        <small id="emailHelp" class="text text-danger font-weight-bolder">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                        <label for="">ترتیب دسته بندی را وارد کنید</label>
                                        <input type="number" name="order" class="form-control" min="1"
                                               placeholder="ترتیب دسته بندی را وارد کنید"
                                               value="{{ $category->order }}"
                                        >

                                    </div>


                                    {{-- Description --}}
                                    <div class="form-group">
                                        @error('description')
                                        <small id="emailHelp" class="text text-danger font-weight-bolder">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                        <label for=""> توضیحات کوتاه دسته بندی را وارد کنید </label>

                                        <textarea class="form-control"
                                                  name="description"
                                                  id="" cols="30" rows="10"
                                                  placeholder="توضیحات کوتاه دسته بندی را وارد کنید">
                                                {{ $category->description }}
                                                  </textarea>
                                        <small class="counter_small"></small>
                                    </div>

                                </div>
                                <div class="col-md-6">

                                    <x-form.select name="positions" :value="$selected_positions"
                                                   namefa="{{ __('site.positions') }}" :items="$positions"
                                                   type="{{ __('routes.categories_singular') }}"
                                                   require="0" multiple="1"></x-form.select>

                                </div>
                                <div class="col-md-6">
                                    <x-form.select name="themes" :value="$selected_themes" namefa="{{ __('site.themes') }}" :items="$themes" type="{{ __('routes.articles_singular') }}"
                                                   require="0" multiple="0"></x-form.select>
                                </div>
                            </div>







                            {{-- Body --}}
                            <div class="form-group">
                                @error('body')
                                <small id="emailHelp" class="text text-danger font-weight-bolder">
                                    {{ $message }}
                                </small>
                                @enderror
                                <label for=""> متن کامل دسته بندی را وارد کنید </label>

                                <textarea class="form-control body "

                                          name="body"
                                          id="" cols="30" rows="10"
                                          placeholder="متن کامل دسته بندی را وارد کنید">
                                          {{ $category->body }}
                                          </textarea>
                                <small class="counter_small"></small>
                            </div>

                            <hr>



  <x-form.filemanager.image  type="دسته بندی" name="image" namefa="تصویر" :value="$category->image" require="1"></x-form.filemanager.image>
                    <x-form.filemanager.icon  type="دسته بندی" name="icon" :value="$category->icons"  namefa="آیکون" require="1"></x-form.filemanager.icon>





                    @if(\App\Utility\Acl::isManager(auth()->id()))
                @can('panel.change.status')
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                            {{ __('site.status_change') }}
                        </h5>


                        <x-form.utility name="status" namefa="{{ __('site.status') }}"
                        :items="\App\Utility\Status::items()" type="دسته بندی"
                        :value="$category->status"
                        require="0" multiple="0"></x-form.utility>




                    </div>
                </div>
                @endcan
                @endif





                            <button type="submit" class="btn btn-primary">ویرایش دسته بندی</button>
                        </form>

                    </div>
                </div>


            </div>
        </div>


    </div>
@endsection

