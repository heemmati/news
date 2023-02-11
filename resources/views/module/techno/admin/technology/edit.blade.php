@extends ('admin.layout.master2')


@section('content')
    <div class="card">
        <div class="card-body">
            <h6 class="card-title">ایجاد تکنولوژی جدید</h6>
            <form method="POST" action="{{ route('technologies.update' , $technology->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                @include('error.forms')

                <div class="row">
                    <div class="col-12 col-md-6">


                        <x-form.text type="تکنولوژی" name="title" namefa="عنوان" require="1" :value="$technology->title"></x-form.text>
                        <x-form.text type="تکنولوژی" name="link" namefa="لینک مطلب" require="1" :value="$technology->link"></x-form.text>
                        <x-form.text type="تکنولوژی" name="price" namefa="قیمت" require="1" :value="$technology->price"></x-form.text>


                    </div>

                    <div class="col-12 col-md-6">
                        <x-form.utility type="تکنولوژی" name="infect" namefa="تاثیر قیمت بر قیمت کل" require="1" :value="$technology->infect" :items="\Modules\Techno\Utility\Infect::$title"></x-form.utility>

                        <x-form.text type="تکنولوژی" name="entitle" namefa="عنوان انگلیسی" require="1" :value="$technology->entitle"></x-form.text>


                    </div>
                </div>

                <button type="submit" class="btn btn-primary">ویرایش  تکنولوژی</button>

            </form>
        </div>
    </div>
@endsection

@section('scripts')

    <script>

        $("input.tagsinput-example").tagsinput('items');

    </script>

@endsection
