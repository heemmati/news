@extends ('admin.layout.master2')


@section('content')
    <div class="card">
        <div class="card-body">
            <h6 class="card-title">ویرایش دیدگاه مشتری </h6>

            <form method="POST" action="{{ route('testimonials.upsate' , $testimonial->id ) }}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                @include('error.forms')

                <div class="row">
                    <div class="col-12 col-md-6">


                        <x-form.text type="دیدگاه مشتری" name="title" namefa="عنوان" require="1" :value="$testimonial->title"></x-form.text>
                        <x-form.text type="دیدگاه مشتری" name="post" namefa="سمت / مقام / شغل "
                                     :value="$testimonial->post"
                                     require="1"></x-form.text>


                    </div>

                    <div class="col-12 col-md-6">

                        <x-form.textarea type="دیدگاه مشتری" name="description" namefa="دیدگاه"
                                         :value="$testimonial->description"
                                         require="0"></x-form.textarea>

                        <x-form.filemanager.image type="دیدگاه مشتری" name="image" namefa="تصویر آواتار"
                                                  :value="$testimonial->image"
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
                        :items="\App\Utility\Status::items()" :value="$testimonial->status" type="{{ __('site.testimonials_singular') }} "
                        require="0" multiple="0"></x-form.utility>




                    </div>
                </div>
                @endcan
                @endif



                <button type="submit" class="btn btn-primary">ویرایش دیدگاه مشتری</button>

            </form>
        </div>
    </div>
@endsection

