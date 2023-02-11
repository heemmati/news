@extends ('admin.layout.master2')


@section('content')
    <div class="card">
        <div class="card-body">
            <h6 class="card-title">ایجاد مورد فروش جدید</h6>
            <form method="POST" action="{{ route('sales.store') }}" enctype="multipart/form-data">
                @csrf

                @include('error.forms')

                <div class="row">
                    <div class="col-12 col-md-6">


                        <x-form.text type="مورد فروش" name="name" namefa="نام و نام خانوادگی" require="1"></x-form.text>
                        <x-form.text type="مورد فروش" name="mobile" namefa="شماره همراه" require="1"></x-form.text>
                        <x-form.text type="مورد فروش" name="phone" namefa="شماره تلفن" require="1"></x-form.text>
                        <x-form.text type="مورد فروش" name="brand" namefa="برند" require="1"></x-form.text>
                        <x-form.select name="cases" namefa="موارد طراحی" :items="$cases" type="نمونه کار" require="0" multiple="1"></x-form.select>

                    </div>

                    <div class="col-12 col-md-6">

                        <x-form.text type="مورد فروش" name="website" namefa="وبسایت" require="1"></x-form.text>
                        <x-form.text type="مورد فروش" name="activities" namefa="فعالیت های شرکت" require="1"></x-form.text>

                        <x-form.text type="مورد فروش" name="price" namefa="قیمت" require="1" ></x-form.text>


                        <x-form.utility type="مورد فروش" name="introduction" namefa="نحوه آشنایی" require="1" :items="\Modules\Sale\Utility\Introduction::$title"></x-form.utility>

                        <x-form.select name="technologies" namefa="تکنولوژی های بکار رفته" :items="$technologies" type="نمونه کار" require="0" multiple="1"></x-form.select>



                    </div>
                    <div class="col-12 col-md-12">

                    <x-form.textarea type="مورد فروش" name="description" namefa="توضیحات" require="1"></x-form.textarea>


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



                <button type="submit" class="btn btn-primary">ایجاد مورد فروش  جدید</button>

            </form>
        </div>
    </div>
@endsection

@section('scripts')

    <script>

        $("input.tagsinput-example").tagsinput('items');

    </script>

@endsection
