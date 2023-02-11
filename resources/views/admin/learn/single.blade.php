@extends('admin.layout.master')

@section('content')

    <div class="content-wrapper">


        <div class="content-body">

            <div class="content">


                <div class="page-header justify-content-between">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ url('/') }}">@lang('site.dashboard')</a>
                            </li>

                            <li class="breadcrumb-item">
                                <a href="{{  route('helpers.sellers.index') }}">
                                @lang('site.helper_articles')
                                </a>
                            </li>


                            <li class="breadcrumb-item active" aria-current="page"> {{ $helper->title  }}</li>
                        </ol>
                    </nav>

                </div>

                <div class="row">
                    <div class="col-md-12">

                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between mb-4">
                                            <div class="d-flex">
                                                <div>
                                                    <figure class="avatar mr-3">
                                                        <img src="{{ \Illuminate\Support\Facades\Storage::url($helper->image) }}" class="rounded" alt="{{ $helper->title }}">
                                                    </figure>
                                                </div>
                                                <div>
                                                    <h5 class="mt-0">{{ $helper->title }}</h5>

                                                </div>
                                            </div>
                                            <div>

                                            </div>
                                        </div>
                                        <p class="bg-dark-gradient" style="padding: 20px">
                                            {{ $helper->description }}
                                        </p>

                                        <p>
                                            {!! $helper->body !!}

                                        </p>
                                        <div class="row my-4">
                                            <div class="col-md-3">
                                                <p class="mb-2">
                                                    @lang('site.published_at')
                                                </p>
                                                <div>
                                                    <i class="ti-calendar mr-1"></i>
                                                   {{ $helper->timeHandler() }}
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>


                            </div>

                        </div>

                    </div>
                </div>


            </div>


        </div>

    </div>


@endsection
