@extends ('admin.layout.master2')


@section('content')
    <div class="card">
        <div class="card-body">
            <h6 class="card-title">ویرایش نوع نشریه</h6>
            <form method="POST" action="{{ route('newspaper-types.update' , $type->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                @include('error.forms')

                <div class="row">
                    <div class="col-12 col-md-6">


                        <x-form.text type="نوع نشریه" name="title" :value="$type->title" namefa="عنوان" require="1"></x-form.text>


                    </div>

                    <div class="col-12 col-md-6">

                        <x-form.text type="نوع نشریه" name="code"  :value="$type->code" namefa="کد" require="1"></x-form.text>

                    </div>


                </div>

                <button type="submit" class="btn btn-primary">ویرایش نشریه</button>

            </form>
        </div>
    </div>
@endsection

@section('scripts')

    <script>

        $("input.tagsinput-example").tagsinput('items');

    </script>

@endsection
