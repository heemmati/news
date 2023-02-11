<!-- Start Hero
      ============================================= -->
<div id="home" class="hero-section">
    <div class="hero-sliderr">
        <!-- owl Slider Begin -->
        <div class="hero-single" data-background="{{ $image }}">
            <div class="container">
                <div class="row">
                    <div class="col-xl-7">
                        <div class="hero-content">
                            <span class="hero-p1">
                                {{ $head_title }}
                            </span>
                            <h1>
                              {{ $title }}
                            </h1>
                            <p>

                                {{ $description }}

                            </p>
                            <div class="hro-btn">
                                <a href="{{ $link }}" class="theme-btn"> بیشتر بدون !</a>
                                <div class="how-we-work">
                                    <i class="fas fa-play shape-bg"></i>
                                    <span class="how-txt">
                                                چگونه ما میتونیم کمکتون کنیم؟
                                            </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-5">
                        <div class="right-bg">
                            <img src="{{ url('site-theme') }}/assets/img/header/header-4.png" alt="thumb">
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- single Slider End -->
    </div>
</div>
<!-- End hero -->
