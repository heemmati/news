@extends('site.layout.master')


@section('content')
    <main class="main">

        <x-site.tools.breadcrumb title="نمونه کار ها" ></x-site.tools.breadcrumb>
        <x-site.variable.portofolio :portofolios="$portofolios" :categories="$categories"></x-site.variable.portofolio>

    </main>
@endsection
