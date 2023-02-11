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
                        <a href="{{ route('plans.show.items') }}"> ارتقای حساب کاربری </a>
                    </li>

                </ol>
            </nav>


        </div>


        <div class="row">
            <div class="col-md-12">

                <div class="row">
                    @foreach($plans as $plan)
                        <div class="col-md-4">
                            <div class="card  {{ \Modules\Plan\Utility\Plan::hasThis($plan , auth()->user()) ? 'buyed_plan' : '' }}" {{ \Modules\Plan\Utility\Plan::hasThis($plan , auth()->user()) ? 'disabled' : '' }}>
                                <div class="card-body">
                                    <div class="pricing-table m-b-20" style="">

                                        <h3 class="font-weight-bold text-center ">
                                            {{ $plan->title }}
                                        </h3>
                                        <img src="{{ Storage::url($plan->image) }}" alt="">
                                        {!! $plan->body !!}
                                    </div>
                                    <h4 class="text-center">{{ \App\Utility\Shop\Product::price_with_unit($plan->price) }}</h4>
                                    <div class="text-center">
                                        @if($plan->price == 0)
                                            <button class="btn btn-primary">شروع</button>
                                        @else



                                            <form id="update_plan" action="{{ route('other.pay') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="unit" value="{{ \Modules\Shop\Traits\Unit::get_current_currency()  }}">
                                                <input type="hidden" name="type" value="{{ get_class($plan) }}">
                                                <input type="hidden" name="id" value="{{ $plan->id }}">
                                                <input type="hidden" name="payment_type" value="{{ \App\Utility\Shop\Payment::ZARINPAL }}">
                                                <input  type="hidden" name="price" id="plan_price" value="{{ $plan->price }}">

                                                <button class="btn btn-primary">پرداخت</button>
                                            </form>


                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
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


    </script>
@endsection
