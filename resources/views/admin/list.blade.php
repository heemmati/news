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
                        <a href="{{ route('abstracts.index') }}">محصولات من</a>
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
                                @if(isset($products) && !empty($products))
                                    <table id="example1" class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th>آیدی</th>
                                            <th>عنوان محصول</th>
                                            <th>تصویر پیشفرض محصول</th>
                                            <th>دسته بندی محصول</th>
                                            <th>برند محصول</th>
                                            <th>وضعیت</th>
                                            <th>عملیات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach( $products as $product)

                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td><a href="">{{ $product->title }}</a></td>
                                                <td>
                                                    <a href="">
                                                        <img src="http://127.0.0.1:8000/admin-theme/assets/media/image/logo.png" alt="">
                                                    </a>
                                                </td>
                                               <td>
                                                   {{ $product->category->title }}
                                               </td>
                                                <td>
                                                    {{ $product->brand->title }}
                                                </td>

                                                <td> <a href=""
                                                        class="btn {{ $product->status == 1 ? 'btn-success' : 'btn-danger' }} btn-xs">
                                                        {{ $product->status == 1 ? 'فعال' : 'غیر فعال' }}
                                                    </a></td>
                                                <td>


                                                    <a href="">
                                                        <i class="fa fa-eye"></i>
                                                    </a>

                                                    <a href="{{ route('products.edit' , $product->id) }}">
                                                        <i class="fa fa-pen"></i>
                                                    </a>


                                                        <a href="javascript:void(0)" class="sa-warning">
                                                            <i  class="fa fa-trash"></i>
                                                        </a>
                                                    {{--Deleting Form--}}
                                                    <form action="{{ route('products.destroy' , $product->id) }}}"
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
                                            <th>عنوان محصول</th>
                                            <th>دسته بندی محصول</th>

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
                                            <a href="{{route('products.create')}}">اینجا</a>
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
