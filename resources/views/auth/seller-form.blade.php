@extends('auth.layout.master2')

@section('content')
    <!-- form -->
    <form class="verfication_code" method="POST" action="{{ route('auth.register.verify') }}">
        @csrf
        <div class="form-group">
            <input type="number" name="verify_code" class="form-control" placeholder="کد ارسالی را وارد کنید" required>
        </div>


        <button class="btn btn-primary btn-block">ارسال</button>
        <hr>
        <p class="text-muted">آیا دارای اکانت هستید؟</p>
        <a href="{{ route('login') }}" class="btn btn-outline-light btn-sm">وارد شوید!</a>
    </form>
    <!-- ./ form -->

@endsection
