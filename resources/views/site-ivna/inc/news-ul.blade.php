<div class="news-title">
    <h2>
        {{ !empty($title) ? $title : 'اخبار مرتبط' }}
    </h2>
</div>
<ul>
    @foreach($news as $similar)
        @if($similar instanceof \App\Model\News\Article)
            <li>
                <a href="{{ $similar->path() }}">
                    {{ $similar->title }}
                </a>
            </li>
        @else
            <li>
                <a href="{{ $similar->article->path() }}">
                    {{ $similar->article->title }}
                </a>
            </li>
        @endif
    @endforeach
</ul>
