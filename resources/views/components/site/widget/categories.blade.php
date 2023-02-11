@if(isset($categories) && !empty($categories) && count($categories) > 0)
    <div class="sidebar-widget cate">
        <h4 class="widget-title">دسته بندی ها</h4>
        <ul>
            @foreach($categories as $category)
                <li><a href="{{ $category->path() }}"><i
                            class="fas fa-tags"></i>{{ $category->title }}</a></li>

            @endforeach
        </ul>
    </div>
@endif
