@extends ('admin.layout.master2')


@section('content')
    <div class="card">
        <div class="card-body">
            <h6 class="card-title">ایجاد تعرفه تبلیغات جدید</h6>
            <form method="POST" action="{{ route('ads-tariffs.store') }}" enctype="multipart/form-data">
                @csrf

                @include('error.forms')

                <div class="row">
                    <div class="col-12 col-md-6">


                        <x-form.text type="تعرفه تبلیغات" name="title" namefa="عنوان" require="1"></x-form.text>
                        <x-form.text type="تعرفه تبلیغات" name="price" namefa="قیمت" require="1"></x-form.text>


                    </div>

                    <div class="col-12 col-md-6">
                        <x-form.select type="تعرفه تبلیغات" name="type_id" namefa="نوع"  :items="$types" require="1"></x-form.select>

                    <x-form.textarea type="تعرفه تبلیغات" name="description" namefa="توضیحات کوتاه" require="0"></x-form.textarea>

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




                <button type="submit" class="btn btn-primary">ایجاد تعرفه تبلیغات جدید</button>

            </form>
        </div>
    </div>
@endsection

@section('scripts')

    <script>

        $("input.tagsinput-example").tagsinput('items');

    </script>

@endsection
