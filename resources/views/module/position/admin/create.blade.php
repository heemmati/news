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
                        <a href="">ایجاد جایگاه جدید</a>
                    </li>


                </ol>
            </nav>
        </div>


        <div class="row">
            <div class="col-md-12">


                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">ایجاد جایگاه جدید</h6>
                        <form method="POST" action="{{ route('positions.store') }}" enctype="multipart/form-data">
                            @csrf
                        @include('error.forms')


                            <div class="form-group">
                                @error('title')
                                <small id="emailHelp" class="text text-danger font-weight-bolder">
                                    {{ $message }}
                                </small>
                                @enderror
                                <label for="">عنوان جایگاه را وارد کنید</label>
                                <input type="text" name="title" class="form-control"
                                       placeholder="عنوان جایگاه را وارد کنید"
                                       required>

                            </div>


                            <div class="form-group">
                                @error('code')
                                <small id="emailHelp" class="text text-danger font-weight-bolder">
                                    {{ $message }}
                                </small>
                                @enderror
                                <label for="">کد جایگاه را وارد کنید</label>
                                <input type="text" name="code" class="form-control"
                                       placeholder="کد جایگاه را وارد کنید"
                                       required>

                            </div>


                            <div class="form-group">
                                @error('type')
                                <small id="emailHelp" class="text text-danger font-weight-bolder">
                                    {{ $message }}
                                </small>
                                @enderror
                                <label for="">جایگاه برای :</label>

                                <select name="type" class="form-control" id="">
                                    @foreach(\App\Utility\Position\Positions::get_items() as $key => $item)
                                        <option value="{{ $key }}">
                                            {{ $item }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>



                            <div class="form-group">
                                @error('limit')
                                <small id="emailHelp" class="text text-danger font-weight-bolder">
                                    {{ $message }}
                                </small>
                                @enderror
                                <label for=""> تعداد نمایش </label>

                                <input type="number" min="1" name="limit" class="form-control"
                                       placeholder="تعداد نمایش"
                                       required>

                            </div>


                            @if(\App\Utility\Acl::isManager(auth()->id()))
                            @can('panel.change.status')
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        {{ __('site.status_change') }}
                                    </h5>


                                    <x-form.utility name="status" namefa="{{ __('site.status') }}"
                                    :items="\App\Utility\Status::items()" type="دسته بندی"
                                    require="0" multiple="0"></x-form.utility>




                                </div>
                            </div>
                            @endcan
                            @endif




                            <button type="submit" class="btn btn-primary">ایجاد جایگاه جدید</button>
                        </form>

                    </div>
                </div>


            </div>
        </div>


    </div>
@endsection

