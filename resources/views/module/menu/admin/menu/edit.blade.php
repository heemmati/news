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
                            ویرایش منو
                            {{ $menu->title }}
                        </a>
                    </li>
                </ol>
            </nav>
        </div>


        <div class="row">
            <div class="col-md-12">


                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">ویرایش منو
                            {{ $menu->title }}</h6>


                        <form method="POST" action="{{ route('menus.update' , $menu->id) }}" enctype="multipart/form-data">
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
                                        <label for="">عنوان منوی را وارد کنید</label>
                                        <input type="text" name="title" class="form-control"
                                               placeholder="عنوان منوی را وارد کنید"
                                               value="{{ $menu->title }}"
                                               required>
                                        <small class="counter_small"></small>

                                    </div>


                                    {{--Code--}}
                                    <div class="form-group">
                                        @error('code')
                                        <small id="emailHelp" class="text text-danger font-weight-bolder">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                        <label for="">کد منو را وارد کنید</label>
                                        <input type="text" name="code" class="form-control"
                                               placeholder="کد منو را وارد کنید"
                                               value="{{ $menu->code }}"
                                               required>
                                        <small class="counter_small"></small>

                                    </div>




                                </div>

                                <div class="col-12 col-md-6">


                                    <div class="form-group">
                                        @error('description')
                                        <small id="emailHelp" class="text text-danger font-weight-bolder">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                        <label for=""> توضیحات کوتاه منوی را وارد کنید </label>

                                        <textarea class="form-control"
                                                  name="description"
                                                  id="" cols="30" rows="10"

                                                  placeholder="توضیحات کوتاه منوی را وارد کنید">
                                            {{ $menu->description }}
                                        </textarea>
                                        <small class="counter_small"></small>
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
                        :items="\App\Utility\Status::items()" :value="$menu->status" type="{{ __('site.menus_singular') }} "
                        require="0" multiple="0"></x-form.utility>




                    </div>
                </div>
                @endcan
                @endif


                            <button type="submit" class="btn btn-primary"> ویرایش منو </button>
                        </form>

                    </div>
                </div>


            </div>
        </div>


    </div>
@endsection

