@extends ('admin.layout.master2')


@section('content')
    <div class="card">
        <div class="card-body">
            <h6 class="card-title">ویرایش نشریه</h6>
            <form method="POST" action="{{ route('newspapers.update' , $newspaper->id) }}" enctype="multipart/form-data">
                @csrf
@method('PATCH')
                @include('error.forms')

                <div class="row">
                    <div class="col-12 col-md-6">


                        <x-form.text type="نشریه" name="title" namefa="عنوان" require="1" :value="$newspaper->title"></x-form.text>
                        <x-form.text type="نشریه" name="entitle" namefa="عنوان انگلیسی" require="0" :value="$newspaper->entitle"></x-form.text>
                        <x-form.text type="نشریه" name="number" namefa="شماره" require="1" :value="$newspaper->number"></x-form.text>
                        <x-form.text type="نشریه" name="print_date" kind="date"  namefa="تاریخ نشر" :value="$newspaper->print_date" require="0"></x-form.text>
                        <x-form.select type="نشریه" name="type_id" :items="$types" namefa="نوع" :value="$newspaper->type_id" require="1"></x-form.select>


                    </div>

                    <div class="col-12 col-md-6">

                        <x-form.textarea type="نشریه" name="description" namefa="توضیحات کوتاه"  :value="$newspaper->description" require="0"></x-form.textarea>
                        <x-form.filemanager.image  type="نشریه" name="image" namefa="تصویر" require="1"></x-form.filemanager.image>
                        <x-form.filemanager.file  type="نشریه" name="file" namefa="فایل" require="1"></x-form.filemanager.file>
                    </div>

                    <div class="col-12">
                        <x-form.textarea type="نشریه" name="body" namefa="بدنه" :value="$newspaper->body" require="0"></x-form.textarea>

                    </div>
                </div>

                @if(\App\Utility\Acl::isManager(auth()->id()))
                @can('panel.change.status')
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                            {{ __('site.status_change') }}
                        </h5>


                        <x-form.utility name="status" namefa="{{ __('site.status') }}"
                        :items="\App\Utility\Status::items()" :value="$newspaper->status" type="{{ __('site.newspapers_singular') }} "
                        require="0" multiple="0"></x-form.utility>




                    </div>
                </div>
                @endcan
                @endif


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
