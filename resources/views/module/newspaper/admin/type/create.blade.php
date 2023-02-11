@extends ('admin.layout.master2')


@section('content')
    <div class="card">
        <div class="card-body">
            <h6 class="card-title">ایجاد نوع نشریه جدید</h6>
            <form method="POST" action="{{ route('newspaper-types.store') }}" enctype="multipart/form-data">
                @csrf

                @include('error.forms')

                <div class="row">
                    <div class="col-12 col-md-6">


                        <x-form.text type="نوع نشریه" name="title" namefa="عنوان" require="1"></x-form.text>


                    </div>

                    <div class="col-12 col-md-6">

                        <x-form.text type="نوع نشریه" name="code" namefa="کد" require="1"></x-form.text>

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



                </div>

                <button type="submit" class="btn btn-primary">ایجاد نوع نشریه جدید</button>

            </form>
        </div>
    </div>
@endsection

@section('scripts')

    <script>

        $("input.tagsinput-example").tagsinput('items');

    </script>

@endsection
