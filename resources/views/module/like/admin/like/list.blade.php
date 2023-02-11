@extends ('admin.layout.master')


@section('content')

    <div class="row">
        <div class="col-md-12">

            <div class="card">
                <div class="card-body">
                    @if(isset($likes) && !empty($likes))



                            <table id="example1" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>آیدی</th>
                                    <th> نام کاربر و یا آی پی </th>
                                    <th> وارد شده برای </th>
                                    <th>رای</th>
                                    <th>عملیات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach( $likes as $like)

                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ !empty($like->user_id) && isset($like->user_id)  ? $like->user->name : $like->ip }}</td>
                                        <td>
                                            @if(isset($like->likeable) && !empty($like->likeable))
                                            {{ $like->likeable->title }}
                                            @endif
                                            </td>

                                        <x-form.like-type :type="$like->type"></x-form.like-type>
                                        <td>


                                            <a href="javascript:void(0)" class="sa-warning">
                                                <i class="fa fa-trash"></i>
                                            </a>

                                            {{--Deleting Form--}}
                                            <form action="{{ route('likes.destroy' , $like->id) }}}"
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
                            هیچ پسندی یافت نشد!
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
