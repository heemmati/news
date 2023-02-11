@extends ('admin.layout.master2')


@section('content')
    <div class="card">
        <div class="card-body">
            <h6 class="card-title">ایجاد پیگیری  جدید</h6>
            <form method="POST" action="{{ route('trackings.store') }}" enctype="multipart/form-data">
                @csrf

                @include('error.forms')

                <div class="row">
                    <div class="col-12 col-md-12">
                        <x-form.select type="پیگیری" name="sale_id" namefa=" مورد فروش " :value="sale_id" require="1"
                                       :items="$sales"></x-form.select>

                    </div>
                    <div class="col-12 col-md-6">


                        <x-form.textarea type="پیگیری" name="isay" namefa="چیزی که من گفتم" require="1" :value="isay"></x-form.textarea>


                    </div>

                    <div class="col-12 col-md-6">
                        <x-form.textarea type="پیگیری" name="hesay" namefa="چیزی که اون گفت" require="1" :value="hesay"></x-form.textarea>




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
                        :items="\App\Utility\Status::items()" :value="$tracking->status" type="{{ __('site.trackings_singular') }} "
                        require="0" multiple="0"></x-form.utility>




                    </div>
                </div>
                @endcan
                @endif


                <button type="submit" class="btn btn-primary">ویرایش پیگیری</button>

            </form>
        </div>
    </div>
@endsection

@section('scripts')

    <script>

        $("input.tagsinput-example").tagsinput('items');

    </script>

@endsection
