@if(isset($new) && !empty($new))
<article class="zm-post-lay-e zm-single-post clearfix">
    <div class="zm-post-thumb f-right">
        <a href="{{ $new->path() }}">
            <x-site.tools.image
                :image="$new"></x-site.tools.image>
        </a>
    </div>
    <div class="zm-post-dis f-left">
        <div class="zm-post-header">
            <x-site.news.title-h2 :title="$new->title"
                                  :path="$new->path()"></x-site.news.title-h2>

            <div class="zm-post-meta">
                <x-site.news.meta
                    :new="$new"></x-site.news.meta>
            </div>
        </div>
    </div>
</article>
    @endif
