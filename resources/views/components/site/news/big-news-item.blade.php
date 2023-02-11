@if(isset($new) && !empty($new))
    <article class="zm-trending-post zm-lay-c large zm-single-post" data-dark-overlay="2.5"
             data-scrim-bottom="9" data-effict-zoom="1">
        <div class="zm-post-thumb">
            @if(isset($new->images[0]) && !empty($new->images[0]))
                <x-site.tools.image :image="$new"></x-site.tools.image>
            @endif
        </div>
        <div class="zm-post-dis text-white">
            <div class="zm-category">

                <x-category-td :categories="$new->categories"></x-category-td>

            </div>
            <x-site.news.title-h2 :title="$new->title" :path="$new->path()"></x-site.news.title-h2>
            <x-site.news.meta :new="$new"></x-site.news.meta>
        </div>
    </article>

@endif
