
@if(isset($services) && !empty($services) && count($services) > 0)
    <!-- Start Feature
        ============================================= -->
    <div class="feature-area de-padding">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 offset-xl-2">
                    <div class="site-title text-center">
                        <span class="sub-head">کاری که ما انجام میدهیم؟</span>
                        <h2>خدماتی که ما انجام می دهیم</h2>
                    </div>
                </div>
            </div>
            <div class="feature-wrapper grid-3">
                @foreach($services as $service)
                    <div class="feature-box">
                        <div class="feature-icon">

                            @if(isset($service->icons[0]) && !empty($service->icons[0]))
                            <i class="{{ $service->icons[0]->src }}"></i>
                                @endif
                        </div>
                        <div class="feature-desc">
                            <h4>{{ $service->title }}</h4>
                            <p>
                               {{ \Illuminate\Support\Str::limit($service->description , 100 ) }} ...
                            </p>
                            <div class="feature-btn">
                                <a href="{{ $service->path() }}" class="feature-btn"><i class="ti-plus"></i>بیشتر بخوانید ... </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- End Feature -->

@endif
