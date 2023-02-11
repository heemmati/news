@extends ('admin.layout.master')


@section('content')
    <div class="content">


        <div class="page-header">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.panel') }}">داشبورد</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('article-origins.index') }}">مدیریت منابع اخبار</a>
                    </li>

                </ol>
            </nav>

            @can('articles.create')
                <div class="page-header_actions">

                    <a class="btn btn-dribbble" href="{{ route('article-origins.create') }}">
                        ایجاد منبع خبر جدید
                    </a>

                </div>
            @endcan


        </div>


        <div class="row">
            <div class="col-md-12">

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                @if(isset($origins) && !empty($origins))
                                    <table id="example1" class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>عنوان منبع خبر</th>
                                            <th> لینک منبع خبر</th>
                                            <th> عملیات</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($origins as $origin)



                                            <tr>
                                                <td>{{ $loop->iteration }}</td>

                                                <td>
                                                    {{ $origin->title }}
                                                </td>

                                                <td>
                                                    <a href="{{ $origin->link }}">
                                                        {{ $origin->link }}
                                                    </a>

                                                </td>




                                                <td>

                                                    @can('article-origins.edit')
                                                        <a href="{{ route('article-origins.edit' , $origin->id) }}">
                                                            <i class="fa fa-pen"></i>
                                                        </a>
                                                    @endcan


                                                    @can('article-origins.destroy')
                                                        <a href="javascript:void(0)" class="sa-warning">
                                                            <i class="fa fa-trash"></i>
                                                        </a>
                                                        {{--Deleting Form--}}
                                                        <form
                                                            action="{{ route('article-origins.destroy' , $origin->id) }}"
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
                                            <th>#</th>
                                            <th>عنوان منبع خبر</th>
                                            <th> لینک منبع خبر</th>
                                            <th> عملیات</th>


                                        </tr>
                                        </tfoot>
                                    </table>
                                @else
                                    <div class="alert alert-secondary" role="alert">
                                        هیچ نوع خبری یافت نشد!
                                    </div>
                                @endif
                            </div>
                        </div>
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
