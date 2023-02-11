@extends ('admin.layout.master2')


@section('content')
    <div class="card">
        <div class="card-body">
            <h6 class="card-title">ویرایش مهارت </h6>
            <form method="POST" action="{{ route('skills.update' , $skill->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                @include('error.forms')

                <div class="row">
                    <div class="col-12 col-md-6">


                        <x-form.text type="مهارت" name="title" namefa="عنوان" require="1" :value="$skill->title"></x-form.text>
                        <x-form.text type="مهارت" name="entitle" namefa="عنوان انگلیسی" require="0" :value="$skill->entitle"></x-form.text>
                        <x-form.text type="مهارت" name="history" namefa="زمان داشتن مهارت" require="0" :value="$skill->history"></x-form.text>



                    </div>

                    <div class="col-12 col-md-6">
                        <x-form.text type="مهارت" name="percentage" namefa="درصد مهارت" require="1" :value="$skill->percentage"></x-form.text>

                        <x-form.textarea type="مهارت" name="description" namefa="توضیحات کوتاه" require="0" :value="$skill->description"></x-form.textarea>
                        <x-form.select name="technologies" namefa="تکنولوژی های بکار رفته" :items="$technologies" type="مهارت" require="0" multiple="1"></x-form.select>

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
                        :items="\App\Utility\Status::items()" :value="$skill->status" type="{{ __('site.skills_singular') }} "
                        require="0" multiple="0"></x-form.utility>




                    </div>
                </div>
                @endcan
                @endif


                <button type="submit" class="btn btn-primary">ویرایش مهارت</button>

            </form>
        </div>
    </div>
@endsection

@section('scripts')

    <script>

        $("input.tagsinput-example").tagsinput('items');

    </script>

@endsection
