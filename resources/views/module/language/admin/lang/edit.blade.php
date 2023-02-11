@extends ('admin.layout.master2')


@section('content')
    <div class="card">
        <div class="card-body">
            <h6 class="card-title"> ویرایش زبان </h6>
            <form method="POST" action="{{ route('langs.update' , $lang->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                @include('error.forms')

                <div class="row">
                    <div class="col-12 col-md-6">
                        <x-form.text  type="زبان" name="title" namefa="عنوان" require="1" :value="$lang->title"></x-form.text>
                        <x-form.text  type="زبان" name="code" namefa="کد مخفف" require="1" :value="$lang->code"></x-form.text>


                    </div>

                    <div class="col-12 col-md-6">
                        <x-form.filemanager.image name="image" namefa="پرچم"></x-form.filemanager.image>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">ویرایش زبان</button>
            </form>
        </div>
    </div>
@endsection

@section('scripts')

    <script>

        $("input.tagsinput-example").tagsinput('items');

    </script>

@endsection
