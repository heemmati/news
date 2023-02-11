@extends ('admin.layout.master2')


@section('content')
    <div class="card">
        <div class="card-body">
            <h6 class="card-title">ایجاد دیدگاه جدید</h6>
            <form method="POST" action="{{ route('generals.store') }}" enctype="multipart/form-data">
                @csrf

                @include('error.forms')

                <div class="row">
                    <div class="col-12 col-md-6">
                         <x-form.text type="دیدگاه" name="name" namefa="نام و نام خانوادگی" require="1"></x-form.text>
                    </div>

                    <div class="col-12 col-md-6">

                        <x-form.text type="دیدگاه" name="email" namefa="ایمیل" require="1"></x-form.text>

                    </div>
                    <div class="col-12 col-md-6">

                        <x-form.text type="دیدگاه" name="email" namefa="شماره همراه" require="1"></x-form.text>

                    </div>
                    <div class="col-12 col-md-6">

                        <x-form.text type="دیدگاه" name="email" namefa="ایمیل" require="1"></x-form.text>

                    </div>
                </div>

                <button type="submit" class="btn btn-primary">ایجاد دیدگاه جدید</button>

            </form>
        </div>
    </div>
@endsection

@section('scripts')

    <script>

        $("input.tagsinput-example").tagsinput('items');

    </script>

@endsection
