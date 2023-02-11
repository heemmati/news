@extends ('admin.layout.master2')


@section('content')
    <div class="card">
        <div class="card-body">
            <h6 class="card-title">ایجاد تنظیمات جدید</h6>
            <form method="POST" action="{{ route('general-items.store') }}" enctype="multipart/form-data">
                @csrf

                @include('error.forms')

                <div class="row">
                    <div class="col-12 col-md-6">
                        <x-form.text type="تنظیمات" name="title" namefa="عنوان" require="1"></x-form.text>
                        <x-form.text type="تنظیمات" name="code" namefa="کد برنامه نویسی" require="1"></x-form.text>
                        <x-form.select type="تنظیمات" name="general_id" namefa="گروه تنظیمات مد نظر " require="1"
                                       :items="$generals"></x-form.select>

                    </div>

                    <div class="col-12 col-md-6">
                        <x-form.textarea type="تنظیمات" name="description" namefa="توضیحات کوتاه"
                                         require="0"></x-form.textarea>
                        <x-form.utility type="تنظیمات" name="general_type" namefa=" نوع ورودی " require="1"
                                        :items="\App\Utility\Setting\GeneralType::types()"
                                        id="type_select"></x-form.utility>

                    </div>

                    <div class="col-12 col-md-12">
                        <div id="ajax_value"></div>
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




                <button type="submit" class="btn btn-primary">ایجاد تنظیمات جدید</button>
            </form>
        </div>
    </div>
@endsection

@section('scripts')

    <script>

        $("input.tagsinput-example").tagsinput('items');

    </script>


    <script>

        function get_input(type_id){
            $.ajax({
                type: 'POST',
                url: "{{route('general-items.input')}}",
                data: {
                    "id": type_id,
                    "_token": "{{ csrf_token() }}",
                },
                success: function (data) {

                    $('#ajax_value').html(data.html);
                }
            });
        }


        $('#type_select select').change(function () {
           get_input($(this).val());
        });
        // general-items.input
    </script>



@endsection
