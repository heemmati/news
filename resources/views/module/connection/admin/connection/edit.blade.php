@extends ('admin.layout.master2')


@section('content')
    <div class="card">
        <div class="card-body">
            <h6 class="card-title">ویرایش ارتباطات </h6>
            <form method="POST" action="{{ route('connections.update' , $connection->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                @include('error.forms')

                <div class="row">
                    <div class="col-12 col-md-6">


                        <x-form.text type="ارتباطات" name="title" namefa="عنوان" require="1" :value="$connection->title"></x-form.text>
                        <x-form.select type="ارتباطات" name="parent_id" namefa="پدر" :items="$connections" require="1" :value="$connection->parent_id"  ></x-form.select>


                    </div>

                    <div class="col-12 col-md-6">

                        <x-form.textarea type="ارتباطات" name="description" namefa="توضیحات کوتاه" require="0" :value="$connection->description"></x-form.textarea>

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
                        :items="\App\Utility\Status::items()" :value="$connection->status" type="{{ __('site.connections_singular') }} "
                        require="0" multiple="0"></x-form.utility>




                    </div>
                </div>
                @endcan
                @endif

                <button type="submit" class="btn btn-primary">ویرایش ارتباطات </button>

            </form>
        </div>
    </div>
@endsection

@section('scripts')

    <script>

        $("input.tagsinput-example").tagsinput('items');

    </script>

@endsection
