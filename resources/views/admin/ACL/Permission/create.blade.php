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
                        <a href="">ایجاد دسترسی جدید</a>
                    </li>

                </ol>
            </nav>
        </div>


        <div class="row">
            <div class="col-md-12">



                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">ایجاد دسترسی جدید</h6>
                        <form method="POST" action="{{ route('permissions.store') }}" enctype="multipart/form-data">
                        @csrf
                            <div class="form-group">
                                <label for="">نام دسترسی را وارد کنید</label>
                                <input type="text" name="name" class="form-control" placeholder="نام دسترسی را وارد کنید">
                            </div>
                            <div class="form-group">
                                <label for="">اسلاگ دسترسی را وارد کنید</label>
                                <input type="text" name="slug" class="form-control" placeholder="اسلاگ دسترسی را وارد کنید">
                            </div>

                            <button type="submit" class="btn btn-primary">ایجاد دسترسی جدید</button>
                        </form>

                    </div>
                </div>



            </div>
        </div>


    </div>
@endsection


