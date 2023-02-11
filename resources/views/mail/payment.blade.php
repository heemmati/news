<h3>خریدار گرامی</h3>
<p>
    پرداخت شما در سیستم به مبلغ
    <br>
    {{ $payment->total }}
    <br>

    @if($payment->status == \App\Utility\Shop\Payment::SUCCESS)
        موفقیت آمیز بود
    @else
        نا موفق بود
    @endif


</p>

<h3>کد رهگیری : </h3>
<p>{{ $payment->code }}</p>
