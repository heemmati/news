@extends ('admin.layout.master')


@section('content')
    <div class="content">


        <div class="page-header">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.panel') }}">@lang('site.dashboard')</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('reports.products') }}">  گزارش گیری از محصولات </a>
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
                                <form action="{{ route('reports.products.report') }}" method="post">
                                    @csrf
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="">انتخاب کشور</label>
                                            <select class="form-control select_js" name="country_id" id="country_id">
                                                @foreach($countries as $country)
                                                    <option value="{{ $country->id }}">
                                                        {{ $country->title }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <small>کشور خود را انتخاب کنید</small>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="">انتخاب استان / ایالت </label>
                                            <select class="form-control select_js" name="state_id" id="state_id">
                                                <option value="">تهران</option>
                                                <option value="">زنجان</option>
                                            </select>
                                            <small>استان خود را انتخاب کنید</small>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="">انتخاب شهر </label>
                                            <select class="form-control select_js" name="city_id" id="city_id">
                                                <option value="">تهران</option>
                                                <option value="">ابهر</option>
                                            </select>
                                            <small>شهر خود را انتخاب کنید</small>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary" type="submit"> اعمال </button>
                                </form>
                            </div>

                        </div>
                        <div class="card">
                            <div class="card-body">
                                @if(isset($abstracts) && !empty($abstracts))
                                    <table  class="table table-striped table-bordered">
                                        <thead>
                                        <tr>

                                            <th>کد کالا </th>
                                            <th>نام و نام خانوادگی فروشنده</th>
                                            <th>عنوان محصول</th>
                                            <th>شهر</th>
                                            <th>تعداد فروش</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($abstracts as $abstract)
                                            <tr>
                                                <td>{{ $abstract->code }}</td>


                                                <td>{{ $abstract->seller_name() }}</td>
                                                <td>{{ $abstract->product->title }}</td>


                                                <td>
                                                    {{ $abstract->seller_city() }}
                                                </td>
                                                <td>
                                                    {{ $abstract->buyCount }}
                                                </td>

                                            </tr>
                                        @endforeach
                                        </tbody>
                                        <tfoot>
                                        <tr>


                                            <th>کد کالا </th>
                                            <th>نام و نام خانوادگی فروشنده</th>
                                            <th>عنوان محصول</th>
                                            <th>شهر</th>
                                            <th>تعداد فروش</th>

                                        </tr>
                                        </tfoot>
                                    </table>
                                @else
                                    <div class="alert alert-secondary" role="alert">
                                        هیچ محصولی یافت نشد
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


        /* Addresses Ajax*/

        function getStates(country_id) {

            $.ajax({
                type: 'POST',
                url: "{{route('auth.register.state')}}",
                data: {
                    "id": country_id,
                    "_token": "{{ csrf_token() }}",
                },
                success: function (data) {
                    $('#state_id').html(data.html);
                }
            });
        }

        function getCity(state_id) {

            $.ajax({
                type: 'POST',
                url: "{{route('auth.register.city')}}",
                data: {
                    "id": state_id,
                    "_token": "{{ csrf_token() }}",
                },
                success: function (data) {
                    $('#city_id').html(data.html);
                }
            });
        }

        $(document).on('change', '#country_id', function () {

            getStates($(this).val());

        });


        $(document).on('change', '#state_id', function () {

            getCity($(this).val());

        });


        /* Addresses Ajax*/

    </script>
@endsection
