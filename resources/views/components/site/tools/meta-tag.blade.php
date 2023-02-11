<div class="single-content-tags">
    <ul>
        @foreach($tags as $tag)
            <li><a href="{{ $tag->path() }}"><i class="fas fa-tag"></i>{{ $tag->title }}</a></li>
        @endforeach

    </ul>
</div>
