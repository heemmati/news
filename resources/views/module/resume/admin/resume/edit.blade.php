@extends ('admin.layout.master2')


@section('content')
    <div class="card">
        <div class="card-body">
            <h6 class="card-title">ویرایش رزومه</h6>
            <form method="POST" action="{{ route('resumes.update' , $resume->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                @include('error.forms')

                <div class="row">
                    <div class="col-12 col-md-6">


                        <x-form.text type="رزومه" name="title" namefa="عنوان" require="1" :value="$resume->title"></x-form.text>
                        <x-form.text type="رزومه" name="post" namefa="عنوان شغلی" require="1" :value="$resume->post"></x-form.text>
                        <x-form.text type="رزومه" name="where" namefa="محل رزومه" require="1" :value="$resume->where"></x-form.text>




                    </div>

                    <div class="col-12 col-md-6">
                        <x-form.text type="رزومه" name="start" kind="date"  namefa="شروع فعالیت" require="0" :value="$resume->start"></x-form.text>
                        <x-form.text type="رزومه" name="end" kind="date" namefa="اتمام فعالیت" require="0" :value="$resume->end"></x-form.text>

                        <x-form.textarea type="رزومه" name="description" namefa="توضیحات کوتاه" require="0" :value="$resume->description"></x-form.textarea>

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
                        :items="\App\Utility\Status::items()" :value="$resume->status" type="{{ __('site.resumes_singular') }} "
                        require="0" multiple="0"></x-form.utility>




                    </div>
                </div>
                @endcan
                @endif


                <button type="submit" class="btn btn-primary">ویرایش رزومه</button>

            </form>
        </div>
    </div>
@endsection

@section('scripts')

    <script>

        $("input.tagsinput-example").tagsinput('items');

    </script>

@endsection
