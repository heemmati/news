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
                        <a href="">ویرایش تیکت</a>
                    </li>


                </ol>
            </nav>
        </div>


        <div class="row">
            <div class="col-md-12">


                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">ویرایش تیکت </h6>

                        <form method="POST" action="{{ route('tickets.update' , $ticket->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')

                            <div class="form-group">
                                @error('title')
                                <small id="emailHelp" class="text text-danger font-weight-bolder">
                                    {{ $message }}
                                </small>
                                @enderror
                                <label for="">عنوان تیکت را وارد کنید</label>

                                <input type="text" name="title" class="form-control"
                                       value="{{ $ticket->title }}"
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
                                        <option value="{{ $department->id }}" {{ $ticket->department_id == $department->id ? 'selected' : '' }}>{{ $department->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            {{-- Department--}}



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
                                        <option value="{{  $key }}" {{ $ticket->priority == $key ? 'selected' : '' }}>{{ $pri }}</option>
                                    @endforeach
                                </select>
                            </div>
                            {{-- Priority--}}

                            {{-- Priority--}}
                            <div class="form-group">
                                @error('priority')
                                <small id="emailHelp" class="text text-danger font-weight-bolder">
                                    {{ $message }}
                                </small>
                                @enderror
                                <label for="">وضعیت تیکت را انتخاب کنید</label>
                                <select name="status" class="form-control" id="">
                                    @foreach(\Modules\Ticket\Utility\Ticket::status() as $key => $pri)
                                        <option value="{{  $key }}" {{ $ticket->status == $key ? 'selected' : '' }}>{{ $pri }}</option>
                                    @endforeach
                                </select>
                            </div>
                            {{-- Priority--}}




                            <button type="submit" class="btn btn-primary">
                                ویرایش تیکت
                            </button>
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
