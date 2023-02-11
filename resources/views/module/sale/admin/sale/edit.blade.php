@extends ('admin.layout.master2')


@section('content')
    <div class="card">
        <div class="card-body">
            <h6 class="card-title">ویرایش مورد فروش </h6>
            <form method="POST" action="{{ route('sales.update' , $sale->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                @include('error.forms')

                <div class="row">
                    <div class="col-12 col-md-6">


                        <x-form.text type="مورد فروش" name="name" :value="$sale->name" namefa="نام و نام خانوادگی" require="1"></x-form.text>
                        <x-form.text type="مورد فروش" name="mobile" :value="$sale->mobile" namefa="شماره همراه" require="1"></x-form.text>
                        <x-form.text type="مورد فروش" name="phone" :value="$sale->phone" namefa="شماره تلفن" require="1"></x-form.text>
                        <x-form.text type="مورد فروش" name="brand" :value="$sale->brand" namefa="برند" require="1"></x-form.text>
                        <x-form.select name="cases" namefa="موارد طراحی" :items="$cases" type="نمونه کار" require="0" multiple="1" :value="$sale->cases"></x-form.select>

                    </div>

                    <div class="col-12 col-md-6">

                        <x-form.text type="مورد فروش" name="website" :value="$sale->website" namefa="وبسایت" require="1"></x-form.text>
                        <x-form.text type="مورد فروش" name="activities" :value="$sale->activities" namefa="فعالیت های شرکت" require="1"></x-form.text>

                        <x-form.text type="مورد فروش" name="price" :value="$sale->price" namefa="قیمت" require="1" ></x-form.text>


                        <x-form.utility type="مورد فروش" name="introduction" :value="$sale->introduction" namefa="نحوه آشنایی" require="1" :items="\Modules\Sale\Utility\Introduction::$title"></x-form.utility>
                        <x-form.select name="technologies" namefa="تکنولوژی های بکار رفته" :items="$technologies" type="نمونه کار" require="0" multiple="1" :value="$sale->technologies"></x-form.select>


                    </div>


                    <x-form.textarea type="مورد فروش" name="description"  :value="$sale->description" namefa="توضیحات" require="1"></x-form.textarea>

                </div>

                @if(\App\Utility\Acl::isManager(auth()->id()))
                @can('panel.change.status')
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                            {{ __('site.status_change') }}
                        </h5>


                        <x-form.utility name="status" namefa="{{ __('site.status') }}"
                        :items="\App\Utility\Status::items()" :value="$sale->status" type="{{ __('site.sales_singular') }} "
                        require="0" multiple="0"></x-form.utility>




                    </div>
                </div>
                @endcan
                @endif


                <button type="submit" class="btn btn-primary">ویرایش مورد فروش </button>

            </form>
        </div>
    </div>
@endsection

@section('scripts')

    <script>

        $("input.tagsinput-example").tagsinput('items');

    </script>

@endsection
