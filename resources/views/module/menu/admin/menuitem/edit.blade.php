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
                        <a href=""> ویرایش آیتم منوی {{ $item->title }}</a>
                    </li>
                </ol>
            </nav>
        </div>


        <div class="row">
            <div class="col-md-12">


                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">
                            ویرایش آیتم منوی {{ $item->title }}
                        </h6>


                        <form method="POST" action="{{ route('menu-items.update' , $item->id ) }}" enctype="multipart/form-data">
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
                                        <label for="">عنوان آیتم منو را وارد کنید</label>
                                        <input type="text" name="title" class="form-control"
                                               placeholder="عنوان آیتم منو را وارد کنید"
                                               value="{{ $item->title }}"
                                               required>
                                        <small class="counter_small"></small>

                                    </div>



                                    {{--Link--}}
                                    <div class="form-group">
                                        @error('link')
                                        <small id="emailHelp" class="text text-danger font-weight-bolder">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                        <label for="">لینک آیتم منو را وارد کنید</label>
                                        <input type="text" name="link" class="form-control"
                                               placeholder="لینک آیتم منو را وارد کنید"
                                               value="{{ $item->link }}"
                                               required>
                                        <small class="counter_small"></small>

                                    </div>


                                    {{--place--}}
                                    <div class="form-group">
                                        @error('place')
                                        <small id="emailHelp" class="text text-danger font-weight-bolder">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                        <label for="">ترتیب آیتم منو را وارد کنید</label>
                                        <input type="number" min="1" name="place" class="form-control"
                                               placeholder="ترتیب آیتم منو را وارد کنید"
                                               value="{{ $item->place }}"
                                        >
                                        <small class="counter_small"></small>

                                    </div>





                                </div>

                                <div class="col-12 col-md-6">


                                    <div class="form-group">

                                        @error('menu_id')
                                        <small id="emailHelp" class="text text-danger font-weight-bolder">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                        <label for="">مربوط به منوی : </label>
                                        @if(isset($menus) && !empty($menus))
                                            <select name="menu_id" id="" class="form-control select_js"
                                                    required>

                                                @foreach($menus as $menu)
                                                    <option value="{{ $menu->id }}"
                                                        {{ $menu->id == $item->menu_id ? 'selected' : '' }}
                                                    >
                                                        {{ $menu->title }}
                                                    </option>
                                                @endforeach

                                            </select>

                                        @else
                                            <p class="alert alert-warning">
                                                ابتدا از مدیریت منو ها یک منو ایجاد کنید!
                                            </p>
                                        @endif
                                    </div>


                                    <div class="form-group">

                                        @error('parent_id')
                                        <small id="emailHelp" class="text text-danger font-weight-bolder">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                        <label for="">مربوط به منوی : </label>
                                        @if(isset($items) && !empty($items))
                                            <select name="parent_id" id="" class="form-control select_js"
                                                    required>

                                                <option value="0">
                                                    مادر
                                                </option>

                                                @foreach($items as $item2)
                                                    <option value="{{ $item2->id }}"
                                                        {{ $item2->id == $item->id ? 'selected' : '' }}
                                                    >
                                                        {{ $item2->title }}
                                                    </option>
                                                @endforeach


                                            </select>

                                        @else

                                        @endif
                                    </div>


                                    {{--Icon--}}
                                    <div class="form-group">
                                        @error('icon')
                                        <small id="emailHelp" class="text text-danger font-weight-bolder">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                        <label for="">آیکون آیتم منو را وارد کنید</label>
                                        <input type="text" min="1" name="icon" class="form-control"
                                               placeholder="آیکون آیتم منو را وارد کنید"
                                               value="{{ $item->icon }}"
                                        >
                                        <small class="counter_small"></small>

                                    </div>





                                </div>
                            </div>


                            <div class="form-group">
                                @error('description')
                                <small id="emailHelp" class="text text-danger font-weight-bolder">
                                    {{ $message }}
                                </small>
                                @enderror
                                <label for=""> توضیحات کوتاه آیتم منو را وارد کنید </label>

                                <textarea class="form-control"
                                          name="description"
                                          id="" cols="30" rows="10"
                                          placeholder="توضیحات کوتاه آیتم منو را وارد کنید">
                                    {{ $item->description }}
                                </textarea>
                                <small class="counter_small"></small>
                            </div>


                            @if(\App\Utility\Acl::isManager(auth()->id()))
                @can('panel.change.status')
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                            {{ __('site.status_change') }}
                        </h5>


                        <x-form.utility name="status" namefa="{{ __('site.status') }}"
                        :items="\App\Utility\Status::items()" :value="$item->status" type="{{ __('site.menu-items_singular') }} "
                        require="0" multiple="0"></x-form.utility>




                    </div>
                </div>
                @endcan
                @endif


                            <button type="submit" class="btn btn-primary">ایجاد آیتم منوی جدید</button>

                        </form>

                    </div>
                </div>


            </div>
        </div>


    </div>
@endsection

