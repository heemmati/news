@if(isset($recent) && !empty($recent) && count($recent) > 0)
    <div class="sidebar-widget recent-post">
        <h4 class="widget-title">آخرین مطالب</h4>
        <div class="recent-post-content">
            @foreach($recent as $new)
                <div class="recent-post-single">
                    <div class="recent-post-img">
                        <x-site.tools.image :image="$new"></x-site.tools.image>
                    </div>
                    <div class="recent-post-info">
                        <span>2 دقیقه قبل</span>
                        <h5>{{ $new->title }}</h5>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endif
