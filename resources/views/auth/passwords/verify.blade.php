@extends('auth.layout.master2')

@section('content')
<div class="form-wrapper">




    <h5>کد تایید را وارد کنید</h5>

    <!-- form -->
    <form class="verfication_code" method="POST" action="{{ route('auth.password.verify') }}">
        @csrf
        <div class="form-group">
            <input type="number" name="verify_code" class="form-control" placeholder="کد ارسالی را وارد کنید" required>
        </div>


        <button class="btn btn-primary btn-block">ارسال</button>

    </form>
    <!-- ./ form -->


</div>
@endsection
