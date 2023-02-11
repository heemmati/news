<div class="zm-post-meta">
    <ul>
        @ischeck($new->user)
        <li class="s-meta"><a href="#" class="zm-author"> {{ $new->user->name }} </a></li>
        @endischeck

        <li class="s-meta"><a href="#" class="zm-date">
                {{ $new->timeHandler() }}
            </a></li>
    </ul>
</div>
