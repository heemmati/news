@extends ('admin.layout.master2')


@section('content')

        <form method="POST" action="{{ route('tags.automate.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="row">
            <br>



            <div class="col-md-12">

                <div class="card">
                    <div class="card-body">

                        <x-form.tag ></x-form.tag>


                        <button class="btn btn-danger">@lang('site.submit')</button>

                    </div>
                </div>








            </div>
            </div>
        </form>








@endsection

@section('scripts')

    <script>
        $("input.tagsinput-example").tagsinput('items');
    </script>



@endsection
