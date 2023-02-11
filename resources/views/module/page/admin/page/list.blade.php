@extends ('admin.layout.master2')


@section('content')

    <div class="row">
        <div class="col-md-12">

            <div class="card">
                <div class="card-body">
                    @if(isset($pages) && !empty($pages))



                        <table id="example1" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>@lang('site.ID')</th>
                                <th>@lang('site.page_title')</th>

                                <th>@lang('site.status')</th>
                                <th>@lang('site.operation')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach( $pages as $page)

                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <a href="{{ $page->path() }}">
                                            {{ $page->title }}
                                        </a>
                                    </td>

                                    <td>
                                        <x-status-show :status="$page->status" :model="$page"></x-status-show>
                                    </td>

                                    <td>


                                        @can('pages.edit')
                                            <a href="{{ route('pages.edit' , $page->id ) }}">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                        @endcan



                                        @can('pages.show')
                                            <a href="{{ route('pages.show' , $page->id ) }}">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                        @endcan



                                        @can('pages.destroy')
                                            <a href="javascript:void(0)" class="sa-warning">
                                                <i class="fa fa-trash"></i>
                                            </a>

                                            {{--Deleting Form--}}
                                            <form action="{{ route('pages.destroy' , $page->id) }}}"
                                                  method="POST" style="display: none">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn-default"></button>
                                            </form>
                                            {{--Deleting Form--}}
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>@lang('site.ID')</th>
                                <th>@lang('site.page_title')</th>

                                <th>@lang('site.status')</th>
                                <th>@lang('site.operation')</th>
                            </tr>
                            </tfoot>
                        </table>



                    @else
                        <div class="alert alert-secondary" role="alert">
                            @lang('site.there_is_no_page')
                        </div>
                    @endif
                </div>
            </div>


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
