@extends('auth.layout.master2')

@section('content')
<div class="form-wrapper">



    <h5>بازیابی رمز عبور</h5>

    <!-- form -->
    <form method="POST" action="{{ route('auth.password.email') }}">
        @csrf


        <div class="form-group row">
            <label for="email" class="text-md-right">{{ __('site.enterance') }}</label>


                <input id="enterance" type="text" class="form-control @error('email') is-invalid @enderror" name="enterance" value="{{ $email ?? old('enterance') }}" required autocomplete="enterance" autofocus>

                @error('enterance')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>

            <button class="btn btn-primary btn-block">بازیابی رمز عبور</button>

    </form>
    <!-- ./ form -->


</div>

@endsection
