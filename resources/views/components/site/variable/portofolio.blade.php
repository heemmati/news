<!-- Start work
       ============================================= -->
<div id="portfolio" class="portfolio-area bg-2 de-padding">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 offset-xl-2">
                <div class="site-title text-center">
                    <span class="sub-head">نمونه کار های ما</span>
                    <h2>بهترین ها با ما همکاری می کنند</h2>
                </div>
            </div>
        </div>
        <div class="portfolio-items-area">
            <div class="row">
                <div class="col-xl-12 portfolio-content">
                    <div class="mix-item-menu active-theme text-center">
                        <button class="active" data-filter="*">همه</button>
                        @foreach($categories as $category)

                        <button data-filter=".P{{ $category->id }}" class="">{{ $category->title }}</button>

                            @endforeach
                    </div>
                    <!-- End Mixitup Nav-->
                    <div class="magnific-mix-gallery masonary">
                        <div id="portfolio-grid" class="portfolio-items">
                            @foreach($portofolios as $porto)
                            <div class="pf-item @foreach($porto->categories as $category) P{{ $category->id }} @endforeach
">

                                <div class="right-img">
                                    <div class="right-img-effect">
                                        <x-site.tools.image :image="$porto"></x-site.tools.image>
                                        <a href="{{ $porto->path() }}"
                                           class="item popup-link"><i
                                                class="fas fa-search"></i></a>
                                        <div class="right-img-overlay">
                                            <div class="right-desc">
                                                <div class="heading">
                                                    @if(isset($porto->categories[0]) && !empty($porto->categories[0]))
                                                    <span>{{ $porto->categories[0]->title }}</span>
                                                    @endif
                                                    <a href="{{ $porto->path() }}"><h4>
                                                            {{ $porto->title }}
                                                        </h4></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Work -->
