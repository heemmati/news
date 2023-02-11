@extends ('admin.layout.master')


@section('content')
    <div class="content">


        <x-admin.partials.page-header :breadcrumbs="$breadcrumbs"></x-admin.partials.page-header>

        <div class="row">
            <div class="col-md-12">

                <div class="row">
                    <div class="col-md-12">

                        <div class="card">
                            <div class="card-body">
                                @if(isset($word_groups) && !empty($word_groups))
                                    <table id="example1" class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th>آیدی</th>
                                            <th>عنوان گروه کلمات</th>
                                            <th>نام گروه کلمات</th>
                                            <th>اسلاگ گروه کلمات</th>
                                            <th> وضعیت گروه کلمات </th>
                                            <th>عملیات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach( $word_groups as $word_group)

                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $word_group->title }}</td>
                                                <td>{{ $word_group->name }}</td>
                                                <td>{{ $word_group->slug }}</td>


                                                <td>
                                                    <x-status-show :status="$word_group->status"></x-status-show>
                                                </td>

                                                <td>

                                                    <a href="{{ route('word-groups.edit' , $word_group->id) }}">
                                                        <i class="fa fa-pen"></i>
                                                    </a>


                                                    <a href="javascript:void(0)" class="sa-warning">
                                                        <i class="fa fa-trash"></i>
                                                    </a>

                                                    {{--Deleting Form--}}
                                                    <form action="{{ route('word-groups.destroy' , $word_group->id) }}}"
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
                                            <th>عنوان گروه کلمات</th>
                                            <th>نام گروه کلمات</th>
                                            <th>اسلاگ گروه کلمات</th>
                                            <th> وضعیت گروه کلمات </th>
                                            <th>عملیات</th>
                                        </tr>
                                        </tfoot>
                                    </table>
                                @else
                                    <div class="alert alert-secondary" role="alert">
                                        هیچ گروه کلماتی یافت نشد!
                                    </div>
                                @endif
                            </div>
                        </div>

                    </div>
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
