
<div class="blog-area de-padding">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 offset-xl-2">
                <div class="site-title text-center">
                    <span class="sub-head"> آخرین مطالب دیجی مگ </span>
                    <h2>آخرین اخبار و مقالات </h2>
                </div>
            </div>
        </div>
        <div class="blog-wrapper grid-3">
            @foreach($articles as $article)
            <div class="blog-box">
                <div class="blog-pic">
                    <x-site.tools.image :image="$article"></x-site.tools.image>
                </div>
                <div class="blog-desc">
                    <span>{{ $article->timeHandler() }}</span>
                    <h4>{{ $article->title }}</h4>
                    <a href="{{ $article->path() }}">بیشتر بخوانید ... </a>
                </div>
            </div>

                @endforeach
        </div>
    </div>
</div>
<!-- End Blog-->
