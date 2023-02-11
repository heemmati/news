@extends ('admin.layout.master2')


@section('content')
    <div class="card">
        <div class="card-body">
            <h6 class="card-title">ایجاد مورد طراحی جدید</h6>
            <form method="POST" action="{{ route('cases.store') }}" enctype="multipart/form-data">
                @csrf

                @include('error.forms')

                <div class="row">
                    <div class="col-12 col-md-6">


                        <x-form.text type="مورد" name="title" namefa="عنوان" require="1"></x-form.text>
                        <x-form.text type="مورد" name="price" namefa="قیمت" require="1" ></x-form.text>

                    </div>

                    <div class="col-12 col-md-6">
                        <x-form.text type="مورد" name="link" namefa="لینک مطلب" require="1" ></x-form.text>


                        <x-form.utility type="مورد" name="infect" namefa="تاثیر قیمت بر قیمت کل" require="1" :items="\Modules\Techno\Utility\Infect::$title"></x-form.utility>


                        <x-form.select type="مورد" name="parent_id" namefa=" سر مجموعه  " require="1"
                                       :items="$cases"></x-form.select>

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



                <button type="submit" class="btn btn-primary">ایجاد مورد طراحی جدید</button>

            </form>
        </div>
    </div>
@endsection

@section('scripts')

    <script>

        $("input.tagsinput-example").tagsinput('items');

    </script>

@endsection
