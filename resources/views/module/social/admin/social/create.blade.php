@extends ('admin.layout.master2')


@section('content')
    <div class="card">
        <div class="card-body">
            <h6 class="card-title">ایجاد شبکه اجتماعی جدید</h6>
            <form method="POST" action="{{ route('sliders.store') }}" enctype="multipart/form-data">
                @csrf

                @include('error.forms')

                <div class="row">
                    <div class="col-12 col-md-6">


                        <x-form.text type="شبکه اجتماعی" name="title" namefa="عنوان" require="1"></x-form.text>
                        <x-form.text type="شبکه اجتماعی" name="entitle" namefa="عنوان انگلیسی" require="1"></x-form.text>
                        <x-form.text type="شبکه اجتماعی" kind="color" name="color" namefa="رنگ" require="0"></x-form.text>


                    </div>

                    <div class="col-12 col-md-6">

                    <x-form.textarea type="شبکه اجتماعی" name="description" namefa="توضیحات کوتاه" require="0"></x-form.textarea>

                        <x-form.filemanager.image  type="شبکه اجتماعی" name="image" namefa="تصویر" require="1"></x-form.filemanager.image>
                        <x-form.filemanager.icon  type="شبکه اجتماعی" name="icon" namefa="آیکون" require="1"></x-form.filemanager.icon>

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
                        :items="\App\Utility\Status::items()" type="دسته بندی"
                        require="0" multiple="0"></x-form.utility>




                    </div>
                </div>
                @endcan
                @endif



                <button type="submit" class="btn btn-primary">ایجاد شبکه اجتماعی جدید</button>

            </form>
        </div>
    </div>
@endsection
