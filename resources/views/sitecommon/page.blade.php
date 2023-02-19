
    <section id="news-page-top">
        <div class="container">

            <div class=" row">

                <div class="col-xs-12 col-sm-4">
                    <div class="date-news">
                        <i class="fa fa-calendar"></i>
                        <span class="news_nav_title">تاریخ انتشار: </span>
                        <span>
                                      {{ $page->timeHandler() }}
                  </span>


                    </div>

                </div>


            </div>



        </div>
    </section>

    <section id="news-page">
        <div class="container">

            <div class=" row">
                <div class="col-xs-12 col-sm-1 hidden-xs">
                    <div class="adv-news"></div>
                </div>



                <div class="col-xs-12 col-sm-10">
                    <div id="main1">
                        <h3 class="title-main">

                        </h3>

                        <div class="row boder4-xs">
                            <div class="col-md-8">

                                <h2>
                                    <a href="{{ $page->path() }}" style="color: #ab0000;">
                                        {{ $page->title }}
                                    </a>
                                </h2>

                            </div>
                            <div class="col-md-4">
                                <x-site.tools.image :image="$page"
                                                    class="bg-movei-lnk"></x-site.tools.image>
                            </div>
                        </div>
                        <div class=" boder4-xs">
                            <div class="col-md-12 box-content">

                                {!! $page->body !!}
                            </div>

                            <div class="row">
                                @if(isset($page->tags) && !empty($page->tags) && count($page->tags) > 0 )
                                    <div class="col-md-12 labels">
                                        <ul>
                                            <li>
                                                <label> <i class="fa fa-tags"></i> برچسب ها : </label>
                                            </li>

                                            @foreach($page->tags as $tag)

                                                <li class="tag">
                                                    <span><a href="{{ $tag->path() }}">{{ $tag->title }}</a></span>
                                                </li>

                                            @endforeach



                                        </ul>
                                    </div>
                                @endif
                            </div>
                            <br>


                            <br>
                        </div>
                    </div>


                </div>
            </div>
    </section>