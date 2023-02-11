@extends('auth.layout.master2')

@section('content')
<div class="form-wrapper">




    <h5>ساخت حساب کاربری</h5>

    <!-- form -->
    <form  method="POST" action="{{ route('auth.password.change') }}">
        @csrf
        <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="رمز عبور جدید خود را وارد کنید" required>
        </div>
        <div class="form-group">
            <input type="password" name="password_confirmation" class="form-control" placeholder="رمز عبور جدید خود دوباره را وارد کنید" required>
        </div>


        <button class="btn btn-primary btn-block">بازیابی رمز عبور</button>

    </form>
    <!-- ./ form -->


</div>

@endsection
