@extends ('admin.layout.master2')


@section('content')
    <div class="card">
        <div class="card-body">
            <h6 class="card-title">ایجاد گروه کلمات جدید</h6>
            <form method="POST" action="{{ route('word-groups.update' , $word_group->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                @include('error.forms')

                <div class="row">
                    <div class="col-12 col-md-6">
                        <x-form.text  type="گروه کلمات" name="title" namefa="عنوان" require="1" :value="$word_group->title"></x-form.text>
                        <x-form.text  type="گروه کلمات" name="name" namefa="نام" require="1" :value="$word_group->name"></x-form.text>


                    </div>

                    <div class="col-12 col-md-6">
                        <x-form.text  type="گروه کلمات" name="slug" namefa="اسلاگ" require="1" :value="$word_group->slug"></x-form.text>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">ویرایش گروه کلمات </button>
            </form>
        </div>
    </div>
@endsection

@section('scripts')

    <script>

        $("input.tagsinput-example").tagsinput('items');

    </script>

@endsection
