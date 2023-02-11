@extends ('admin.layout.master2')


@section('content')
    <div class="card">
        <div class="card-body">
            <h6 class="card-title">ایجاد کلمه جدید</h6>
            <form method="POST" action="{{ route('words.store') }}" enctype="multipart/form-data">
                @csrf

                @include('error.forms')

                <div class="row">
                    <div class="col-12 col-md-6">
                        <x-form.text  type="کلمه" name="title" namefa="عنوان" require="1"></x-form.text>
                        <x-form.text  type="کلمه" name="code" namefa="کد" require="1"></x-form.text>


                    </div>

                    <div class="col-12 col-md-6">
                       <x-form.select type="کلمه" name="word_group_id" namefa="گروه کلمات" require="1" :items="$word_groups"></x-form.select>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">ایجاد کلمه جدید</button>
            </form>
        </div>
    </div>
@endsection

@section('scripts')

    <script>

        $("input.tagsinput-example").tagsinput('items');

    </script>

@endsection
