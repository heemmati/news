@extends('site.layout.master')

<!--@section('title', __('Not Found'))-->
<!--@section('code', '404')-->
<!--@section('message', __('Not Found'))-->

@section('seos')
<title>
    @lang('site.titlepage404')
</title>

 <meta name='robots' content='noindex, follow' />

	<meta property="og:title" content="@lang('site.titlepage404')" />
	<meta property="og:site_name" content="@lang('site.seo_first_page')" />

@endsection

@section('content')
<div class="container">
      <div class="page404">
        
        <div class="big404">
            404
        </div>
        <p class="message404">@lang('site.message404')</p>
    </div>
</div>
  
    
@endsection