@if(isset($tags) && !empty($tags) && count($tags) > 0)
    <div class="sidebar-widget Tags">
        <h4 class="widget-title">تگ ها</h4>
        <ul>
            @foreach($tags as $tag)
                <li><a href="{{ $tag->path() }}">{{ $tag->title }}</a></li>
            @endforeach
        </ul>
    </div>
@endif
