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
                                @if(isset($langs) && !empty($langs))
                                    <table id="example1" class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th>آیدی</th>
                                            <th>عنوان زبان</th>
                                            <th> مخفف زبان </th>
                                            <th> پرچم زبان </th>
                                            <th> وضعیت زبان </th>
                                            <th>عملیات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach( $langs as $lang)

                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $lang->title }}</td>
                                                <td>{{ $lang->code }}</td>


                                                @if(isset($lang->images[0]) && !empty($lang->images[0]))
                                                <x-table.image :src="$lang->images[0]"></x-table.image>
                                                @else
                                                    <td>
                                                        ندارد
                                                    </td>

                                                    @endif
                                                <td>


                                                    <x-status-show :status="$lang->status"></x-status-show>
                                                </td>

                                                <td>

                                                    <a href="{{ route('langs.edit' , $lang->id) }}">
                                                        <i class="fa fa-pen"></i>
                                                    </a>


                                                    <a href="javascript:void(0)" class="sa-warning">
                                                        <i class="fa fa-trash"></i>
                                                    </a>

                                                    {{--Deleting Form--}}
                                                    <form action="{{ route('langs.destroy' , $lang->id) }}}"
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
                                            <th>عنوان زبان</th>
                                            <th> مخفف زبان </th>
                                            <th> پرچم زبان </th>
                                            <th> وضعیت زبان </th>
                                            <th>عملیات</th>
                                        </tr>
                                        </tfoot>
                                    </table>
                                @else
                                    <div class="alert alert-secondary" role="alert">
                                        هیچ زبانی یافت نشد!
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
