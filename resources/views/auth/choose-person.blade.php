@extends('auth.layout.master2')
@section('content')


    <div class="form-wrapper">
        <!-- logo -->
        <div id="logo">
            <img class="logo" style="width: 100%" src="{{ Storage::url( $main_setting->getItem('logo')->image) }}" alt="">
            <img class="logo-dark" style="width: 100%" src="{{ Storage::url( $main_setting->getItem('logo')->image) }}" alt="">
        </div>

    <h5>
        @lang('site.choose_person')
    </h5>

    <form action="{{ route('auth.register.person') }}" method="GET">

        <input type="hidden" name="person" value="{{ \App\Utility\Acl::REAL }}">
        <input type="hidden" name="account" value="{{ $account }}">
        <button type="submit" class="btn btn-primary btn-block">@lang('site.i_am_real')</button>
    </form>
    <br>

    @if($account != \App\Utility\Acl::MARKETER)
        <form action="{{ route('auth.register.person') }}" method="GET">

            <input type="hidden" name="account" value="{{ $account }}">
            <input type="hidden" name="person" value="{{ \App\Utility\Acl::LEGAL }}">
            <button type="submit" class="btn btn-primary btn-block">@lang('site.i_am_legal')</button>
        </form>
    @endif

    </div>
@endsection

