@extends ('admin.layout.master2')


@section('content')

    <div class="row">
        <div class="col-md-12">

            <div class="card">
                <div class="card-body">
                    @if(isset($bookmarks) && !empty($bookmarks))



                        <table id="example1" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>آیدی</th>
                                <th>نام و نام خانوادگی</th>
                                <th> وارد شده برای </th>
                                <th>عملیات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach( $bookmarks as $bookmark)

                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $bookmark->user->name }}</td>
                                    <td>{{ $bookmark->bookmarkable->title }}</td>

                                    <td>





                                        <a href="javascript:void(0)" class="sa-warning">
                                            <i class="fa fa-trash"></i>
                                        </a>

                                        {{--Deleting Form--}}
                                        <form action="{{ route('bookmarks.destroy' , $bookmark->id) }}}"
                                              method="POST" style="display: none">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn-default"></button>
                                        </form>
                                        {{--Deleting Form--}}

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>آیدی</th>
                                <th>نام و نام خانوادگی</th>
                                <th> وارد شده برای </th>
                                <th>عملیات</th>
                            </tr>
                            </tfoot>
                        </table>


                    @else
                        <div class="alert alert-secondary" role="alert">
                            هیچ بوک مارکی یافت نشد!
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
