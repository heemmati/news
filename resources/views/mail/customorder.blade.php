<h6>فروشنده گرامی</h6>
<p>
    از کالا
    <br>
    @if(isset($abstract->product) && !empty($abstract->product))
    {{ $abstract->product->title }}
    @endif
    <br>
    به کد
    {{ $abstract->code }}
    <br>
    شما به تعداد
    {{ $order->qty }}
    <br>
    سفارش داده شده است.

</p>
