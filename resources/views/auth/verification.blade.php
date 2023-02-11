@extends('auth.layout.master2')

@section('content')

    <div class="form-wrapper">
        <!-- logo -->
        @if(isset($main_setting) && !empty($main_setting))
        <div id="logo">
            <img class="logo" style="width: 100%" src="{{ Storage::url( $main_setting->getItem('logo')->image) }}" alt="">
            <img class="logo-dark" style="width: 100%" src="{{ Storage::url( $main_setting->getItem('logo')->image) }}" alt="">
        </div>
        @endif
    <h5>@lang('site.confirm_sent_code')</h5>
    <!-- form -->
    <form class="verfication_code" method="POST" action="{{ route('auth.register.verify') }}">
        @csrf
        <div class="form-group">
            <input type="number" name="verify_code" class="form-control" placeholder="@lang('site.enter_sent_code')" required>
        </div>


        <button class="btn btn-primary btn-block">@lang('site.send')</button>
        <hr>
        <p class="text-muted">@lang('site.do_have_account')</p>
        <a href="{{ route('login') }}" class="btn btn-outline-light btn-sm">@lang('site.sign_in')</a>
    </form>
   <!-- ./ form -->
    </div>
@endsection
