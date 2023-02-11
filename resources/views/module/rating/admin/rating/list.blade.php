@extends ('admin.layout.master2')


@section('content')

    <div class="row">
        <div class="col-md-12">

            <div class="card">
                <div class="card-body">
                    @if(isset($ratings) && !empty($ratings))



                        <table id="example1" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>آیدی</th>
                                <th> نام کاربر و یا آی پی </th>
                                <th> وارد شده برای </th>
                                <th>میزان</th>
                                <th>عملیات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach( $ratings as $rating)

                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ !empty($rating->user_id) == true ? $rating->user->name : $rating->ip }}</td>
                                    <td>{{ $rating->ratingable->title }}</td>

                                    <td>
                                        {{ $rating->value }}
                                    </td>
                                    <td>


                                        <a href="javascript:void(0)" class="sa-warning">
                                            <i class="fa fa-trash"></i>
                                        </a>

                                        {{--Deleting Form--}}
                                        <form action="{{ route('ratings.destroy' , $rating->id) }}}"
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
                                <th> نام کاربر و یا آی پی </th>
                                <th> وارد شده برای </th>
                                <th>رای</th>
                                <th>عملیات</th>
                            </tr>
                            </tfoot>
                        </table>



                    @else
                        <div class="alert alert-secondary" role="alert">
                            هیچ ستاره ای یافت نشد!
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
