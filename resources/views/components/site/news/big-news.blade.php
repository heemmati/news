@if(isset($news) && !empty($news) && count($news))
    <div class="trending-post-area">
        <div class="container-fluid">
            <div class="row">
                <div class="trend-post-list zm-lay-c-wrap zm-posts clearfix">
                    @if(count($news) == 1)
                        <div class="col-md-12 col-sm-12 col-xs-12 p-0 pull-right">

                            <x-site.news.big-news-item :new="$news[0]"></x-site.news.big-news-item>


                        </div>

                    @else
                        <div class="col-md-6  col-sm-12 col-xs-12 p-0 pull-right">

                            <x-site.news.big-news-item :new="$news[0]"></x-site.news.big-news-item>


                        </div>
                    @endif
                <!-- End single trend post -->
                    <!-- Start single trend post -->
                    @if(count($news) > 1)
                        <div class="col-md-6 col-sm-12 col-xs-12 pull-right">
                            <div class="row">
                                @if(count($news) > 2)
                                    <div class="col-md-6 col-sm-6 p-0">
                                        <x-site.news.big-news-item :new="$news[1]"></x-site.news.big-news-item>
                                    </div>

                                    <div class="col-md-6 col-sm-6 p-0">
                                        <x-site.news.big-news-item :new="$news[2]"></x-site.news.big-news-item>
                                    </div>
                                @else
                                    <div class="col-md-12 col-sm-12 p-0">
                                        <x-site.news.big-news-item :new="$news[1]"></x-site.news.big-news-item>
                                    </div>
                                @endif
                            </div>
                            @if(count($news) > 3)
                                <div class="row">
                                    @if(count($news) > 4)
                                        <div class="col-md-6 col-sm-6 p-0">
                                            <x-site.news.big-news-item :new="$news[3]"></x-site.news.big-news-item>
                                        </div>
                                        <div class="col-md-6 col-sm-6 p-0">
                                            <x-site.news.big-news-item :new="$news[4]"></x-site.news.big-news-item>
                                        </div>
                                    @else
                                        <div class="col-md-12 col-sm-12 p-0">
                                            <x-site.news.big-news-item :new="$news[3]"></x-site.news.big-news-item>
                                        </div>
                                    @endif
                                </div>
                            @endif
                        </div>
                        <!-- End single trend post -->
                    @endif
                </div>
            </div>
        </div>
    </div>
@endif
