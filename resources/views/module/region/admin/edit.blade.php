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
                        <a href="">ویرایش ناحیه خبری </a>
                    </li>


                </ol>
            </nav>
        </div>






        <div class="row">
            <div class="col-md-12">


                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">ویرایش ناحیه خبری </h6>


                        <form method="POST" action="{{ route('regions.update' , $region->id) }}" enctype="multipart/form-data">
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
                                        <label for="">عنوان ناحیه خبری را وارد کنید</label>
                                        <input type="text" name="title" class="form-control"
                                               placeholder="عنوان ناحیه خبری را وارد کنید"
                                               value="{{ $region->title }}"
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
                                        <label for="">عنوان انگلیسی ناحیه خبری را وارد کنید</label>
                                        <input type="text" name="entitle" class="form-control"
                                               placeholder="عنوان انگلیسی ناحیه خبری را وارد کنید"
                                             value="{{ $region->entitle }}"
                                               required>
                                        <small class="counter_small"></small>
                                    </div>


                                    <div class="form-group">
                                        @error('roles')
                                        <small id="emailHelp" class="text text-danger font-weight-bolder">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                        <label for="">نقش های مرتبط ناحیه خبری را وارد کنید</label>
                                        <select name="roles[]" id="" class="form-control select_js" multiple>
                                            @foreach ($roles as $role)
                                                <option value="{{ $role->id }}" {{ in_array($role->id , $selected_roles) ? 'selected' : '' }}>{{ $role->name }}</option>
                                            @endforeach

                                        </select>
                                        <small class="counter_small"></small>
                                    </div>



                                </div>

                                <div class="col-md-6">



                                    {{-- Description --}}
                                    <div class="form-group">
                                        @error('description')
                                        <small id="emailHelp" class="text text-danger font-weight-bolder">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                        <label for=""> توضیحات کوتاه ناحیه خبری را وارد کنید </label>

                                        <textarea class="form-control"
                                                  name="description"
                                                  id="" cols="30" rows="10"
                                                  placeholder="توضیحات کوتاه ناحیه خبری را وارد کنید">
                                                {{ $region->description }}
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
                                <label for=""> متن کامل ناحیه خبری را وارد کنید </label>

                                <textarea class="form-control body "

                                          name="body"
                                          id="" cols="30" rows="10"
                                          placeholder="متن کامل ناحیه خبری را وارد کنید">
                                          {{ $region->body }}
                                          </textarea>
                                <small class="counter_small"></small>
                            </div>

                            <hr>



  <x-form.filemanager.image  type="ناحیه خبری" name="image" namefa="تصویر" :value="$region->image" require="1"></x-form.filemanager.image>





                    @if(\App\Utility\Acl::isManager(auth()->id()))
                @can('panel.change.status')
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                            {{ __('site.status_change') }}
                        </h5>


                        <x-form.utility name="status" namefa="{{ __('site.status') }}"
                        :items="\App\Utility\Status::items()" type="ناحیه خبری"
                        :value="$region->status"
                        require="0" multiple="0"></x-form.utility>




                    </div>
                </div>
                @endcan
                @endif





                            <button type="submit" class="btn btn-primary">ویرایش ناحیه خبری</button>
                        </form>

                    </div>
                </div>


            </div>
        </div>


    </div>
@endsection

