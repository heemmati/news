@extends ('admin.layout.master2')


@section('content')
    <div class="card">
        <div class="card-body">
            <h6 class="card-title">ایجاد گروه کلمات جدید</h6>
            <form method="POST" action="{{ route('word-groups.store') }}" enctype="multipart/form-data">
                @csrf

                @include('error.forms')

                <div class="row">
                    <div class="col-12 col-md-6">
                        <x-form.text  type="گروه کلمات" name="title" namefa="عنوان" require="1"></x-form.text>
                        <x-form.text  type="گروه کلمات" name="name" namefa="نام" require="1"></x-form.text>


                    </div>

                    <div class="col-12 col-md-6">
                        <x-form.text  type="گروه کلمات" name="slug" namefa="اسلاگ" require="1"></x-form.text>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">ایجاد گروه کلمات جدید</button>
            </form>
        </div>
    </div>
@endsection

@section('scripts')

    <script>

        $("input.tagsinput-example").tagsinput('items');

    </script>

@endsection
