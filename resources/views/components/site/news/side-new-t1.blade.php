@if(isset($news) && !empty($news))
    <aside class="zm-post-lay-a4-area">
        <div class="row mb-40">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="section-title">
                    <h2 class="h6 header-color inline-block uppercase">انتخاب ویراستاران </h2>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="zm-posts">
                    @foreach($news as $new)
                        <article class="zm-post-lay-a4">
                            <div class="zm-post-dis">
                                <div class="zm-post-header">
                                    <x-site.news.title-h2 :title="$new->title"
                                                          :path="$new->path()   "></x-site.news.title-h2>

                                    <x-site.news.meta :new="$new"></x-site.news.meta>

                                </div>
                                <div class="zm-post-content">
                                    <p>
                                        {{ \Illuminate\Support\Str::limit($new->description ,  100 ) }}
                                    </p>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </div>
    </aside>
@endif
