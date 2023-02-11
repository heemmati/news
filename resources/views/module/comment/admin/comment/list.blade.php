@extends ('admin.layout.master2')


@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    @if(isset($comments) && !empty($comments))



                        <table id="example1" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>آیدی</th>
                                <th>نام و نام خانوادگی</th>
                                <th> وارد شده برای</th>
                                <th>دیدگاه</th>
                                <th>وضعیت</th>
                                <th>عملیات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach( $comments as $comment)

                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $comment->name }}</td>
                                    <td>
                                        <a target="_blank" href="{{ $comment->commentable->path() }}">
                                            {{ $comment->commentable->title }}
                                        </a>
                                        </td>
                                    <td>{{ $comment->body }}</td>


                                    <td>
                                        <x-status-show :status="$comment->status"></x-status-show>
                                    </td>

                                    <td>


                                        <a href="javascript:void(0)" class="sa-warning">
                                            <i class="fa fa-trash"></i>
                                        </a>

                                        {{--Deleting Form--}}
                                        <form action="{{ route('comments.destroy' , $comment->id) }}}"
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
                                <th> وارد شده برای</th>
                                <th>دیدگاه</th>
                                <th>وضعیت</th>
                                <th>عملیات</th>
                            </tr>
                            </tfoot>
                        </table>

                    @else
                        <div class="alert alert-secondary" role="alert">
                            هیچ نظری یافت نشد!
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
