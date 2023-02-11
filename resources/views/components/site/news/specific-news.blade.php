@if(isset($news) && !empty($news) && count($news) > 0)
    <aside
        class="zm-post-lay-a-area col-sm-6 col-md-12 col-lg-12 sm-mt-50 xs-mt-50 pull-right">
        <div class="row mb-40">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="section-title">
                    <h2 class="h6 header-color inline-block "> اخبار ویژه </h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="zm-posts">
                    @foreach($news as $new)
                        <article class="zm-post-lay-a sidebar">
                            <div class="zm-post-thumb">
                                <a href="{{ $new->path() }}">
                                    <x-site.tools.image :image="$new"></x-site.tools.image>
                                </a>
                            </div>
                            <div class="zm-post-dis">
                                <div class="zm-post-header">

                                    <x-site.news.title-h2 :title="$new->title"
                                                          :path="$new->path()"></x-site.news.title-h2>


                                    <x-site.news.meta :new="$new"></x-site.news.meta>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </div>
    </aside>
@endif
{{-- Specific Sidebar --}}
