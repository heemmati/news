@if(isset($lists) && !empty($lists) && count($lists) > 0)
    <ul>

        @foreach($lists as $list)
            <li>
                <a href="{{ $list->link }}">
                    {{ $list->title }}
                </a>

                @if(isset($list->children) && !empty($list->children))
                    <x-basic.menu :lists="$list->children"></x-basic.menu>
                @endif
            </li>
        @endforeach
    </ul>
@endif

