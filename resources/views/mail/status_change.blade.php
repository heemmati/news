<h3>
    خریدار گرامی
</h3>

<p>
    وضعیت سفارش به حالت
    {{ \App\Utility\Shop\Order::get_order_status($order->status) }}
    در آمد.
</p>

<h6>کد پیگیری سفارش</h6>
<br>
<h4>{{ $order->code }}</h4>
