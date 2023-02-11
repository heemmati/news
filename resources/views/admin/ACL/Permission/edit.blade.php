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
                        <a href="">ویرایش دسترسی </a>
                    </li>

                </ol>
            </nav>
        </div>


        <div class="row">
            <div class="col-md-12">



                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">ویرایش دسترسی</h6>
                        <form method="POST" action="{{ route('permissions.update' , $permission->id ) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label for="">نام دسترسی را وارد کنید</label>
                                <input type="text" name="name" class="form-control" value="{{ $permission->name }}" placeholder="نام دسترسی را وارد کنید">
                            </div>
                            <div class="form-group">
                                <label for="">اسلاگ دسترسی را وارد کنید</label>
                                <input type="text" name="slug" class="form-control" value="{{ $permission->slug }}" placeholder="اسلاگ دسترسی را وارد کنید">
                            </div>

                            <button type="submit" class="btn btn-primary">ویرایش دسترسی </button>
                        </form>

                    </div>
                </div>



            </div>
        </div>


    </div>
@endsection


