@extends ('admin.layout.master2')


@section('content')
    <div class="card">
        <div class="card-body">
            <h6 class="card-title">ایجاد دیدگاه مشتری جدید</h6>

            <form method="POST" action="{{ route('testimonials.store') }}" enctype="multipart/form-data">
                @csrf

                @include('error.forms')

                <div class="row">
                    <div class="col-12 col-md-6">


                        <x-form.text type="دیدگاه مشتری" name="title" namefa="عنوان" require="1"></x-form.text>
                        <x-form.text type="دیدگاه مشتری" name="link" namefa="سمت / مقام / شغل "
                                     require="1"></x-form.text>


                    </div>

                    <div class="col-12 col-md-6">

                        <x-form.textarea type="دیدگاه مشتری" name="description" namefa="دیدگاه"
                                         require="0"></x-form.textarea>

                        <x-form.filemanager.image type="دیدگاه مشتری" name="image" namefa="تصویر آواتار"
                                                  require="1"></x-form.filemanager.image>
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




                <button type="submit" class="btn btn-primary">ایجاد دیدگاه مشتری جدید</button>

            </form>
        </div>
    </div>
@endsection

