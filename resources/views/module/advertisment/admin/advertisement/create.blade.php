@extends ('admin.layout.master2')


@section('content')
    <div class="card">
        <div class="card-body">
            <h6 class="card-title">ایجاد  تبلیغات جدید</h6>
            <form method="POST" action="{{ route('advertisements.store') }}" enctype="multipart/form-data">
                @csrf

                @include('error.forms')

                <div class="row">
                    <div class="col-12 col-md-6">


                        <x-form.text type=" تبلیغات" name="time" namefa="مدت روز" require="1"></x-form.text>
                        <x-form.select type=" تبلیغات" name="tariff_id" namefa="تعرفه"  :items="$tariffs" require="0"></x-form.select>
                        <x-form.checkbox name="mobile" namefa=" فیکس موبایل " type="تبلیغات"  require="0" value="0"></x-form.checkbox>
                        <x-form.filemanager.video  type="تبلیغات" name="video" namefa="ویدیو" require="1"></x-form.filemanager.video>




                    </div>

                    <div class="col-12 col-md-6">
                        <x-form.text type=" تبلیغات" name="start_date" kind="date"  namefa="تاریخ شروع" require="1"></x-form.text>
                        <x-form.text type=" تبلیغات" name="end_date"  kind="date"  namefa="تاریخ اتمام" require="1"></x-form.text>
                        <x-form.filemanager.image  type="تبلیغات" name="image" namefa="تصویر" require="1"></x-form.filemanager.image>





                    </div>

                    <div class="col-12 col-md-12">
                        <x-form.text type=" تبلیغات" name="text"    namefa="متن " require="1"></x-form.text>
                        <x-form.textarea type=" تبلیغات" name="body"    namefa="ادیتور " require="1"></x-form.textarea>
                        <x-form.textarea type=" تبلیغات" name="code"    namefa="اسکریپت " require="1"></x-form.textarea>
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



                <button type="submit" class="btn btn-primary">ایجاد  تبلیغات جدید</button>

            </form>
        </div>
    </div>
@endsection

@section('scripts')

    <script>

        $("input.tagsinput-example").tagsinput('items');

    </script>

@endsection
