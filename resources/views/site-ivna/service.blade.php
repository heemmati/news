@extends('site.layout.master')

@section('content')

    <main class="main">

        <x-site.tools.breadcrumb :title="$service->title"></x-site.tools.breadcrumb>

        <!-- Start work
        ============================================= -->
        <div class="service-info de-padding">
            <div class="container">
                <div class="service-details">
                    <div class="service-info-wrapper">
                        <div class="service-info-box service-info-1">
                            <x-site.tools.image :image="$service"></x-site.tools.image>
                            <h2>{{ $service->title }}</h2>
                            <p>
                                {{$service->description}}
                            </p>
                        </div>
                        <div class="service-info-box service-info-2">
                            {!! $service->body !!}
                        </div>

                    </div>
                    <div class="service-sidebar">
                        @if(isset($services) && !empty($services))
                            <div class="service-sidebar-box service-sidebar-list">
                                <h4 class="service-sidebar-title">همه خدمات</h4>
                                <ul>
                                    @foreach($services as $service)
                                        <li><a href="{{ $service->path() }}">{{ $service->title }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="service-sidebar-box service-sidebar-list service-border">
                            <h4 class="service-sidebar-title">اطلاعات خدمات</h4>
                            <ul>
                                <li>
                                    <span> نام مدیر بخش :</span>
                                    <span>{{ $service->manager_name }}</span>
                                </li>

                                <li>
                                    <span> شماره داخلی مسئول بخش :</span>
                                    <span>{{ $service->internal_phone }}</span>
                                </li>


                                <li>
                                    <span> ایمیل مسئول بخش :</span>
                                    <span>
                                        <a href="mailto::{{ $service->email }} ">
                                           {{ $service->email }}
                                        </a>
                                    </span>
                                </li>




                            </ul>
                            <a href="contact.html" class="theme-btn">ارتباط با مسئول بخش</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- End Work -->

    </main>




@endsection
