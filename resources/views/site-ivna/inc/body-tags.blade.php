@if(isset($tags) && !empty($tags) && count($tags) > 0)
    <div class="news-tags">
        <ul>
            <span>برچسب ها : </span>
            @foreach($tags as  $tag)
                <li>
                    <a href="{{ $tag->path() }}">
                        {{ $tag->title }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
@endif
