@extends ('admin.layout.master2')


@section('content')
    <div class="card">
        <div class="card-body">
            <h6 class="card-title">ویرایش تعرفه تبلیغات </h6>
            <form method="POST" action="{{ route('ads-tariffs.update' , $tariff->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                @include('error.forms')

                <div class="row">
                    <div class="col-12 col-md-6">


                        <x-form.text type="تعرفه تبلیغات" name="title" namefa="عنوان" require="1" :value="$tariff->title"></x-form.text>
                        <x-form.text type="تعرفه تبلیغات" name="price" namefa="قیمت" require="1" :value="$tariff->price" ></x-form.text>


                    </div>

                    <div class="col-12 col-md-6">
                        <x-form.select type="تعرفه تبلیغات" name="type_id" namefa="نوع"  :items="$types" :value="$tariff->type_id" require="1"></x-form.select>

                        <x-form.textarea type="تعرفه تبلیغات" name="description" namefa="توضیحات کوتاه"  :value="$tariff->description" require="0"></x-form.textarea>

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
                        :items="\App\Utility\Status::items()" :value="$tariff->status" type="{{ __('site.tariffs_singular') }} "
                        require="0" multiple="0"></x-form.utility>




                    </div>
                </div>
                @endcan
                @endif



                <button type="submit" class="btn btn-primary">ویرایش تعرفه تبلیغات </button>

            </form>
        </div>
    </div>
@endsection

@section('scripts')

    <script>

        $("input.tagsinput-example").tagsinput('items');

    </script>

@endsection
