@extends ('admin.layout.master2')


@section('content')

        <div class="row">
            @can('tags.automate.store')
            <div class="col-md-6">
                
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
            </div>
            <div class="col-md-6">
                   <div class="row">
            <br>



            <div class="col-md-12">

                <div class="card">
                    <div class="card-body">

                      


                        <a href="{{ route('tags.automate') }}" class="btn btn-success">@lang('site.enter_tag_grouply')</a>

                    </div>
                </div>








            </div>
            </div>
            </div>
             @endcan
            <div class="col-md-12">

                @if(isset($tags) && !empty($tags))
                    <div class="card-group">
                        @foreach($tags as $tag)

                            <div class="card">
                                <div class="card-body">
                                    <h6 class="card-title">
                                        <a href="{{ $tag->path() }}">
                                            {{ $tag->title }} - {{ $tag->view}}
                                        </a>
                                    </h6>
                                    <p class="card-text">
                                        <a href="{{ $tag->path() }}">
                                        #{{ $tag->slug }}
                                        </a>
                                    </p>
                                    <div class="card-text">
                                        <a href="{{ route('tags.edit' , $tag->id) }}">
                                            <i class="fa fa-pen"></i>
                                        </a>


                                        <a href="javascript:void(0)" class="sa-warning">
                                            <i class="fa fa-trash"></i>
                                        </a>

                                        {{--Deleting Form--}}
                                        <form action="{{ route('tags.destroy' , $tag->id) }}}"
                                              method="POST" style="display: none">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn-default"></button>
                                        </form>
                                        {{--Deleting Form--}}

                                    </div>
                                </div>
                            </div>


                        @endforeach
                        {{ $tags->render() }}
                    </div>

                @else
                    <div class="alert alert-secondary" role="alert">
                        هیچ تگی یافت نشد!
                    </div>
                @endif

            </div>
        </div>

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
