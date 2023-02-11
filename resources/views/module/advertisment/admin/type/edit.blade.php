@extends ('admin.layout.master2')


@section('content')
    <div class="card">
        <div class="card-body">
            <h6 class="card-title">ویرایش نوع تبلیغات </h6>
            <form method="POST" action="{{ route('advertisement-types.update' , $type->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                @include('error.forms')

                <div class="row">
                    <div class="col-12 col-md-6">


                        <x-form.text type="نوع تبلیغات" name="title" namefa="عنوان" require="1" :value="$type->title"></x-form.text>


                    </div>

                    <div class="col-12 col-md-6">

                        <x-form.textarea type="نوع تبلیغات" :value="$type->description"   name="description" namefa="توضیحات کوتاه" require="0"></x-form.textarea>

                    </div>
                </div>

                <button type="submit" class="btn btn-primary">ویرایش نوع تبلیغات</button>

            </form>
        </div>
    </div>
@endsection

@section('scripts')

    <script>

        $("input.tagsinput-example").tagsinput('items');

    </script>

@endsection
