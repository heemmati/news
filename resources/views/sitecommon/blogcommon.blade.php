<main class="main">
    @if(isset($news) && !empty($news))
        <div class="container">
            <div class="row">
                <div class="box5">
                    <h1 class="title title-box">
                             <span>


                @lang('site.seo_archive_page')

                         </span>
                    </h1>
                    <div class="search-box">


                        <div class="item-box1">

                            @foreach ($news as $key => $new)
                                <div class="item3 {{ $key == count($news) - 1 ? 'end1' : '' }}">
                                    <div class="item-image">
                                        <x-site.tools.image :image="$new"></x-site.tools.image>
                                    </div>
                                    <div class="description3">
                                        <div class="title">
                                            <h4>
                                                <a href="{{ $new->path() }}">
                                                    {{  $new->title }}
                                                </a>
                                            </h4>
                                        </div>
                                        <div class="desc">
                                            <p>
                                                {{ $new->description }}
                                            </p>
                                        </div>
                                    </div>
                                </div>

                            @endforeach




                        </div>

                    </div>
                    {!! $news->render() !!}

                </div>
            </div>
        </div>

    @endif
</main>