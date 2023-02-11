@extends('auth.layout.master2')

@section('content')

    <div class="form-wrapper">
        <!-- logo -->
        <div id="logo">
            <img class="logo" style="width: 100%" src="{{ Storage::url( $main_setting->getItem('logo')->image) }}" alt="">
            <img class="logo-dark" style="width: 100%" src="{{ Storage::url( $main_setting->getItem('logo')->image) }}" alt="">
        </div>
    <h5>
        @lang('site.choose_account_type')
    </h5>
    <form action="{{ route('auth.register.account') }}" method="POST" enctype="multipart/form-data">

        {{ csrf_field() }}
        <input type="hidden" name="account" value="{{ \App\Utility\Acl::MARKETER }}">
        <button type="submit" class="btn btn-primary btn-block">@lang('site.i_am_marketer')</button>
    </form>
    <br>
    <form action="{{ route('auth.register.account') }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="hidden" name="account" value="{{ \App\Utility\Acl::SELLER }}">
        <button type="submit" class="btn btn-primary btn-block">@lang('site.i_am_seller')</button>
    </form>
    <br>
    <form action="{{ route('auth.register.account') }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="hidden" name="account" value="{{ \App\Utility\Acl::USER }}">
        <button type="submit" class="btn btn-primary btn-block">@lang('site.i_am_buyer')</button>
    </form>
    </div>
@endsection
