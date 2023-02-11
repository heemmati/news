@extends ('admin.layout.master')


@section('content')
    <div class="content">


        <div class="page-header">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.panel') }}">@lang('site.dashboard')</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('favoriotes.index') }}">@lang('site.Wishlists')</a>
                    </li>

                </ol>
            </nav>


        </div>


        <div class="row">
            <div class="col-md-12">

                <div class="row">

                    <div class="col-lg-12 col-md-12">


                        <div class="row">
                            @if(isset($favs) && !empty($favs) && count($favs) > 0)
                                @foreach($favs as $fav)

                                    @if(!empty($fav->product()))
                                    @if(!empty($fav->product()->path()))
                                        <div class="col-lg-4 col-md-6 col-xs-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="d-flex justify-content-between">

                                                    </div>
                                                    <div class="my-3">
                                                        <a href="{{ url($fav->product()->path()) }}"
                                                           title=" {{ $fav->product()->title }}">
                                                            <img class="fav_list_item"
                                                                 src="{{ Storage::url($fav->product()->image) }}"
                                                                 class="img-fluid" alt=" {{ $fav->product()->title }}">
                                                        </a>
                                                    </div>
                                                    <div class="text-center">
                                                        <a href="{{ url($fav->product()->path()) }}">
                                                            <h4> {{ $fav->product()->title }}</h4>
                                                        </a>

                                                        <div class="mt-2">
                                                            <a href="{{ url($fav->product()->path()) }}"
                                                               class="btn btn-primary add-to-card">
                                                                @lang('site.view_product')
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @endif
                                @endforeach
                            @else
                                <div class="alert alert-danger">
                                   @lang('site.wishlist_is_empty')
                                </div>
                            @endif
                        </div>

                        {!! $favs->render() !!}

                    </div>
                </div>

            </div>
        </div>


    </div>
    <!-- DataTable -->


@endsection
@section('scripts')
    <script>

        $(document).on('click', '.sa-warning', function () {

            Swal.fire({
                title: "@lang('site.delete_message')",
                text: "@lang('site.cant_return')",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "@lang('site.remove_it')",
                closeOnConfirm: false
            })
                .then((willDelete) => {
                    console.log(willDelete);
                    if (willDelete.value) {
                        $(this).siblings('form').submit();

                    }
                });
        });


    </script>
@endsection
