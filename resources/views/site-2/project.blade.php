@extends('site.layout.master')

@section('content')
    <main class="main">

        <x-site.tools.breadcrumb :title="$project->title"></x-site.tools.breadcrumb>

        <!-- Start Project Details
        ============================================= -->
        <div class="proj-area de-padding">
            <div class="container">
                <div class="proj-wrapper">
                    <div class="proj-1">
                        <div class="proj-1-1 grid-2">
                            <x-site.tools.image :image="$project"></x-site.tools.image>
                            <div class="proj-1-info">
                                <h4 class="service-sidebar-title">اطلاعات</h4>
                                <ul class="proj-1-info-list">
                                    <li>
                                        <p> عنوان سایت : </p>
                                        <span>{{ $project->title }}</span>
                                    </li>

                                    @if(isset($project->link) && !empty($project->link))
                                        <li>
                                            <p>  لینک اصلی
                                                                                            </p>
                                            <span>
                                            <a class="btn btn-primary" href="{{ $project->link }}">
                                                <i class="fas fa-link"></i>
                                                باز کردن سایت
                                            </a>
                                            </span>
                                        </li>
                                    @endif


                                    @if(isset($project->customer_name) && !empty($project->customer_name))
                                        <li>
                                            <p>کارفرما</p>
                                            <span>{{ $project->customer_name }}</span>
                                        </li>
                                    @endif
                                    @if(isset($project->categories) && !empty($project->categories))

                                        <li>
                                            <p>دسته بندی ها :</p>
                                            <span>

                                                @foreach($project->categories as $category)

                                                        <a class="btn btn-success" href="{{ $category->path() }}">
                                                            {{ $category->title }}
                                                        </a>

                                                @endforeach

                                        </span>
                                        </li>
                                    @endif

                                    @if(isset($project->length) && !empty($project->length))
                                    <li>
                                        <p> مدت انجام پروژه : </p>
                                        <span>
                                            {{ $project->length }}

                                            روز
                                        </span>
                                    </li>
                                    @endif

                                    @if(isset($project->customer_comment) && !empty($project->customer_comment))
                                        <li>
                                            <p>نظر کارفرما در باره خدمات : </p>
                                            <span>

                                                <blockquote class="customer_comment">
                                                     <i class="fas fa-quote-right"></i>
                                                {{ $project->customer_comment }}
                                                <i class="fas fa-quote-left"></i>
                                                </blockquote>

                                            </span>
                                        </li>
                                    @endif



                                    @if(isset($project->customer_mobile) && !empty($project->customer_mobile))
                                        <li>
                                            <p> شماره تماس کارفرما : </p>
                                            <span>

                                              <i class="fas fa-id-badge"></i>
                                                {{ $project->customer_mobile }}
                                            </span>
                                        </li>
                                    @endif

                                    <li>
                                        <p>
                                            اشتراک گذاری :
                                        </p>
                                        <div class="proj-social">
                                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                                            <a href="#"><i class="fab fa-instagram"></i></a>
                                            <a href="#"><i class="fab fa-twitter"></i></a>
                                            <a href="#"><i class="fab fa-youtube"></i></a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="proj-1-txt">
                            <h4> توضیحات </h4>
                            <p>
                               {!! $project->body !!}
                            </p>

                            <h5>تگ ها</h5>
                            <x-site.tools.meta-tag :tags="$project->tags"></x-site.tools.meta-tag>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- End Project Details-->

    </main>
@endsection
