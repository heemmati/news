@if(isset($lists) && !empty($lists) && count($lists) > 0)
    <ul>

        @foreach($lists as $list)

            <li>

                <a href="{{ $list->link }}">

                    @if(isset($list->icon) && !empty($list->icon))
                        {{ $list->title }}
                    @endif

                </a></li>

        @endforeach
    </ul>
@endif
