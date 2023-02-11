@extends ('admin.layout.master2')


@section('content')
    <div class="card">
        <div class="card-body">
            <h6 class="card-title">ایجاد  تبلیغات جدید</h6>
            <form method="POST" action="{{ route('advertisements.update' , $advertisement->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                @include('error.forms')

                <div class="row">
                    <div class="col-12 col-md-6">


                        <x-form.text type=" تبلیغات" name="time" namefa="مدت روز" require="1" :value="$advertisement->time"></x-form.text>
                        <x-form.select type=" تبلیغات" name="tariff_id" namefa="تعرفه"  :items="$tariffs" require="0" :value="$advertisement->tariff_id"></x-form.select>
                        <x-form.checkbox name="mobile" namefa=" فیکس موبایل " type="تبلیغات"
                                         require="0" value="0"></x-form.checkbox>



                    </div>

                    <div class="col-12 col-md-6">
                        <x-form.text type=" تبلیغات" name="start_date" kind="date"  namefa="تاریخ شروع" require="1" :value="$advertisement->start_date"></x-form.text>
                        <x-form.text type=" تبلیغات" name="end_date"  kind="date"  namefa="تاریخ اتمام" require="1" :value="$advertisement->end_date"></x-form.text>





                    </div>

                    <div class="col-12 col-md-12">
                        <x-form.text type=" تبلیغات" name="text"    namefa="متن " require="1" :value="$advertisement->text"></x-form.text>
                        <x-form.textarea type=" تبلیغات" name="body"    namefa="ادیتور " require="1" :value="$advertisement->body"></x-form.textarea>
                        <x-form.textarea type=" تبلیغات" name="code"    namefa="اسکریپت " require="1" :value="$advertisement->code"></x-form.textarea>
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
                        :items="\App\Utility\Status::items()" :value="$advertisement->status" type="{{ __('site.advertisements_singular') }} "
                        require="0" multiple="0"></x-form.utility>




                    </div>
                </div>
                @endcan
                @endif




                <button type="submit" class="btn btn-primary">ویرایش  تبلیغات </button>

            </form>
        </div>
    </div>
@endsection

@section('scripts')

    <script>

        $("input.tagsinput-example").tagsinput('items');

    </script>

@endsection
