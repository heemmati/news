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
                        <a href="">گشودن تیکت جدید</a>
                    </li>


                </ol>
            </nav>
        </div>


        <div class="row">
            <div class="col-md-12">


                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">گشودن تیکت جدید</h6>

                        <form method="POST" action="{{ route('tickets.store') }}" enctype="multipart/form-data">
                            @csrf

                            @include('error.forms')


                            <div class="form-group">
                                @error('title')
                                <small id="emailHelp" class="text text-danger font-weight-bolder">
                                    {{ $message }}
                                </small>
                                @enderror
                                <label for="">عنوان تیکت را وارد کنید</label>

                                <input type="text" name="title" class="form-control"
                                       value="{{ old('title') }}"
                                       placeholder="عنوان تیکت را وارد کنید"
                                       required>
                            </div>

                            {{-- Department--}}
                            <div class="form-group">
                                @error('department_id')
                                <small id="emailHelp" class="text text-danger font-weight-bolder">
                                    {{ $message }}
                                </small>
                                @enderror
                                <label for="">دپارتمان مربوطه را انتخاب کنید</label>
                                <select name="department_id" class="form-control" id="">
                                    @foreach($departments as $department)
                                        <option value="{{ $department->id }}">{{ $department->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            {{-- Department--}}

                            <div class="form-group">
                                @error('body')
                                <small id="emailHelp" class="text text-danger font-weight-bolder">
                                    {{ $message }}
                                </small>
                                @enderror

                                <label> متن تیکت را وارد کنید
                                    <small class="text-danger">*</small>
                                </label>
                                <textarea name="body" id="body" class="form-control" cols="30"
                                          rows="5">{{ old('body') }}</textarea>
                                <small class="form-text text-muted">
                                    متن تیکت را در اینجا وارد کنید
                                </small>
                            </div>

                            <div class="form-group input-group">
                                <label> ضمیمه کردن تصویر
                                </label>
                                <div class="form-group input-group">
                                    <input type="file" class="form-control" name="image"
                                       value="{{ old('image') }}">

                                </div>
                                <small  class="form-text text-muted">
                                    تصویر خود را ضمیمه کنید
                                </small>
                            </div>

                            <div class="form-group input-group">
                                <label> ضمیمه کردن فایل
                                </label>
                                <div class="form-group input-group">
                                    <input type="file"  class="form-control" name="file"
                                          value="{{ old('file') }}">

                                </div>
                                <small  class="form-text text-muted">
                                    فایل خود را ضمیمه کنید
                                </small>
                            </div>

                            {{-- Priority--}}
                            <div class="form-group">
                                @error('priority')
                                <small id="emailHelp" class="text text-danger font-weight-bolder">
                                    {{ $message }}
                                </small>
                                @enderror
                                <label for="">اولویت تیکت را انتخاب کنید</label>
                                <select name="priority" class="form-control" id="">
                                    @foreach(\Modules\Ticket\Utility\Ticket::priorities() as $key => $pri)
                                        <option value="{{  $key }}">{{ $pri }}</option>
                                    @endforeach
                                </select>
                            </div>
                            {{-- Priority--}}



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



                            <button type="submit" class="btn btn-primary">گشودن تیکت جدید</button>
                        </form>

                    </div>
                </div>


            </div>
        </div>


    </div>
@endsection

@section('scripts')
    <script>
        var purpose;
        $(document).on('click', '.button-image', function () {
            window.open('/file-manager/fm-button', 'fm', 'width=1400,height=800');
            purpose = $(this);
        });

        // set file link
        function fmSetLink($url) {
            purpose.parent().parent().find('.image_label').val($url);
        }

    </script>
@endsection
