@extends ('admin.layout.master2')


@section('content')
    <div class="card">
        <div class="card-body">
            <h6 class="card-title">ویرایش تیم </h6>
            <form method="POST" action="{{ route('teams.update' , $team->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                @include('error.forms')

                <div class="row">
                    <div class="col-12 col-md-6">


                        <x-form.text type="تیم" name="title" namefa="عنوان" require="1" :value="$team->title"></x-form.text>
                        <x-form.text type="تیم" name="entitle" namefa="عنوان انگلیسی" require="1" :value="$team->entitle"></x-form.text>
                        <x-form.tag></x-form.tag>


                    </div>

                    <div class="col-12 col-md-6">


                        <x-form.textarea type="تیم" name="description" namefa="توضیحات کوتاه" require="0" :value="$team->description"></x-form.textarea>




                    </div>
                </div>


                <x-form.textarea type="تیم" name="body" namefa="بدنه" require="0" :value="$team->body"></x-form.textarea>




                <div class="row">
                    <div class="col-12 col-md-12">
                        <x-form.filemanager.image name="image" namefa="تصویر پیشفرض" :value="$team->image" ></x-form.filemanager.image>

                    </div>

                    <div class="col-12 col-md-12">
                        <x-form.filemanager.video name="video" namefa="ویدیو پیشفرض" :value="$team->video"></x-form.filemanager.video>

                    </div>


                    <div class="col-12 col-md-12">
                        <x-form.filemanager.file name="file" namefa="فایل پیشفرض"  :value="$team->file"></x-form.filemanager.file>

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
                        :items="\App\Utility\Status::items()" :value="$team->status" type="{{ __('site.teams_singular') }} "
                        require="0" multiple="0"></x-form.utility>




                    </div>
                </div>
                @endcan
                @endif




                <button type="submit" class="btn btn-primary">ویرایش تیم</button>

            </form>
        </div>
    </div>
@endsection

@section('scripts')

    <script>

        $("input.tagsinput-example").tagsinput('items');

    </script>

@endsection
