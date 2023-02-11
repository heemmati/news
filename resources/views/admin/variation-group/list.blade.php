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
                        <a href="{{ route('variationgroups.index') }}">گروه های ویژگی</a>
                    </li>

                </ol>
            </nav>
        </div>

        <div class="row">
            <div class="col-md-12">

                <div class="row">
                    <div class="col-md-12">

                        <div class="card">
                            <div class="card-body">
                                @if(isset($variation_groups) && !empty($variation_groups))
                                    <table id="example1" class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th>آیدی</th>
                                            <th>عنوان تنوع</th>
                                            <th>دسته بندی تنوع</th>
                                            <th>وضعیت</th>
                                            <th>عملیات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach( $variation_groups as $variation_group)

                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $variation_group->title }}</td>

                                               <td>
                                                   {{ $variation_group->category->title }}
                                               </td>


                                                <td> <a href=""
                                                        class="btn {{ $variation_group->status == 1 ? 'btn-success' : 'btn-danger' }} btn-xs">
                                                        {{ $variation_group->status == 1 ? 'فعال' : 'غیر فعال' }}
                                                    </a></td>
                                                <td>


                                                    <a href="">
                                                        <i class="fa fa-eye"></i>
                                                    </a>

                                                    <a href="{{ route('variationgroups.edit' , $variation_group->id) }}">
                                                        <i class="fa fa-pen"></i>
                                                    </a>


                                                        <a href="javascript:void(0)" class="sa-warning">
                                                            <i  class="fa fa-trash"></i>
                                                        </a>
                                                    {{--Deleting Form--}}
                                                    <form action="{{ route('variationgroups.destroy' , $variation_group->id) }}}"
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
                                            <th>عنوان تنوع</th>
                                            <th>وضعیت</th>
                                            <th>عملیات</th>
                                        </tr>
                                        </tfoot>
                                    </table>
                                @else
                                    <div class="alert alert-secondary" role="alert">
                                        هیچ دسته بندی یافت نشد!
                                        <p>
                                            برای ایجاد دسته بندی
                                            <a href="{{route('brands.create')}}">اینجا</a>
                                            کلیک کنید.
                                        </p>
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
    // Deleting Warning and Confirm Needed
    $('.sa-warning').on('click', function () {
        swal({
            title: "آیا برای حذف اطمینان دارید؟",
            text: "با حذف این مورد شما قادر به بازگردانی آن نخواهید بود",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "بله! حذف کن",
            closeOnConfirm: false
        })
            .then((willDelete) => {
                if (willDelete) {
                    if (willDelete) {
                        $(this).siblings('form').submit();
                    }
                } else {
                    swal("Your imaginary file is safe!", {
                        icon: "error",
                    });
                }
            });
    });


    $('.sa-wdfarning').click(function () {
        var willDelete = $(this);
        Swal.fire({
            title: "آیا برای حذف اطمینان دارید؟",
            text: "با حذف این مورد شما قادر به بازگردانی آن نخواهید بود!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "بله! حذف کن",
            closeOnConfirm: false
        }, function () {
            swal("Deleted!", "Your imaginary file has been deleted.", "success");
        }).then(function (isConfirm) {
            if (isConfirm['value'] == true) {
                willDelete.siblings('form').submit();
            }
        });
    });
    // Deleting Warning and Confirm Needed

</script>
@endsection
