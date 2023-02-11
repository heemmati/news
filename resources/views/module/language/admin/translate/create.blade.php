@extends ('admin.layout.master2')


@section('content')
    <div class="card">
        <div class="card-body">
            <h6 class="card-title">ایجاد ترجمه جدید</h6>
            <form method="POST" action="{{ route('translates.store') }}" enctype="multipart/form-data">
                @csrf

                @include('error.forms')

                <div class="row">
                    <div class="col-12 col-md-6">
                        <x-form.text  type="ترجمه" name="title" namefa="عنوان" require="1"></x-form.text>
                        <x-form.select type="ترجمه" name="lang_id" namefa="زبان" require="1" :items="$langs"></x-form.select>


                    </div>

                    <div class="col-12 col-md-6">
                       <x-form.select type="ترجمه" name="word_id" namefa="کلمه" require="1" :items="$words"></x-form.select>

                    </div>
                </div>

                <button type="submit" class="btn btn-primary">ایجاد ترجمه جدید</button>
            </form>
        </div>
    </div>
@endsection

@section('scripts')

    <script>

        $("input.tagsinput-example").tagsinput('items');

    </script>

@endsection
