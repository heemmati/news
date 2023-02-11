@extends ('admin.layout.master2')


@section('content')
    <div class="card">
        <div class="card-body">
            <h6 class="card-title">ویرایش تنظیمات</h6>
            <form method="POST" action="{{ route('general-items.update' , $general_item->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                @include('error.forms')

                <div class="row">
                    <div class="col-12 col-md-6">
                        <x-form.text  type="تنظیمات" name="title" namefa="عنوان" require="1" :value="$general_item->title"></x-form.text>
                        <x-form.text  type="تنظیمات" name="code" namefa="کد برنامه نویسی" require="1" :value="$general_item->code"></x-form.text>

                        <x-form.select  type="تنظیمات"  name="general_id" namefa="گروه تنظیمات مد نظر " require="1" :items="$generals" :value="$general_item->general_id"></x-form.select>

                    </div>

                    <div class="col-12 col-md-6">
                        <x-form.textarea type="تنظیمات" name="description" namefa="توضیحات کوتاه" require="0" :value="$general_item->value"></x-form.textarea>
                    </div>

                    <div class="col-12 col-md-6">

                        @include($input , [
'type' => 'تنظیمات',
 'name' => 'value',
  'namefa' => 'مقدار',
   'require' => 1 ,
   'value' => $general_item->value
                            ])
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
                                                :items="\App\Utility\Status::items()" :value="$general_item->status" type="{{ __('site.general_items_singular') }} "
                                                require="0" multiple="0"></x-form.utility>




                            </div>
                        </div>
                    @endcan
                @endif





                <button type="submit" class="btn btn-primary">ویرایش تنظیمات</button>
            </form>
        </div>
    </div>
@endsection

@section('scripts')

    <script>

        $("input.tagsinput-example").tagsinput('items');

    </script>

@endsection
