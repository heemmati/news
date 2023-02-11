@extends ('admin.layout.master2')


@section('content')
    <div class="card">
        <div class="card-body">
            <h6 class="card-title">ایجاد زبان جدید</h6>
            <form method="POST" action="{{ route('langs.store') }}" enctype="multipart/form-data">
                @csrf

                @include('error.forms')

                <div class="row">
                    <div class="col-12 col-md-6">
                        <x-form.text  type="زبان" name="title" namefa="عنوان" require="1"></x-form.text>
                        <x-form.text  type="زبان" name="code" namefa="کد مخفف" require="1"></x-form.text>


                    </div>

                    <div class="col-12 col-md-6">
                        <x-form.filemanager.image name="image" namefa="پرچم"></x-form.filemanager.image>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">ایجاد زبان جدید</button>
            </form>
        </div>
    </div>
@endsection

@section('scripts')

    <script>

        $("input.tagsinput-example").tagsinput('items');

    </script>

@endsection
