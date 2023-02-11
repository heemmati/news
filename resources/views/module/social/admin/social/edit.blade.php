@extends ('admin.layout.master2')


@section('content')
    <div class="card">
        <div class="card-body">
            <h6 class="card-title">ویرایش اسلایدر</h6>
            <form method="POST" action="{{ route('sliders.update' , $slider->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')


                @include('error.forms')

                <div class="row">
                    <div class="col-12 col-md-6">



                        <x-form.text type="اسلایدر" name="title" namefa="عنوان" require="1" :value="$slider->title"></x-form.text>
                        <x-form.text type="اسلایدر" name="link" namefa="لینک" require="1" :value="$slider->link"></x-form.text>


                    </div>

                    <div class="col-12 col-md-6">

                        <x-form.textarea type="اسلایدر" name="description" namefa="توضیحات کوتاه" require="0" :value="$slider->description"></x-form.textarea>
                        <x-form.textarea type="اسلایدر" name="description2" namefa="توضیحات کوتاه 2" require="0" :value="$slider->description2"></x-form.textarea>
                        <x-form.filemanager.image  type="اسلایدر" name="image" namefa="تصویر" require="1"></x-form.filemanager.image>

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
                        :items="\App\Utility\Status::items()" :value="$social->status" type="{{ __('site.socials_singular') }} "
                        require="0" multiple="0"></x-form.utility>




                    </div>
                </div>
                @endcan
                @endif



                <button type="submit" class="btn btn-primary">ویرایش اسلایدر</button>

            </form>
        </div>
    </div>
@endsection

@section('scripts')

    <script>

        $("input.tagsinput-example").tagsinput('items');

    </script>

@endsection
