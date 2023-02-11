@if(isset($new) && !empty($new))
    <article class="zm-post-lay-c zm-single-post clearfix">
        <div class="zm-post-thumb f-right">
            <a href="{{ $new->path() }}">
                <x-site.tools.image :image="$new"></x-site.tools.image>
            </a>
        </div>
        <div class="zm-post-dis f-left">
            <div class="zm-post-header">
                <div class="zm-category">

                    <x-category-td :categories="$new->categories"></x-category-td>

                </div>
             <x-site.news.title-h2 :title="$new->title" :path="$new->path()"></x-site.news.title-h2>

                <x-site.news.meta :new="$new"></x-site.news.meta>
                <div class="zm-post-content">
                    <p>
                        {{ \Illuminate\Support\Str::limit( $new->description , 100 )  }}
                    </p>
                </div>
            </div>
        </div>
    </article>
@endif
