@if(isset($items) && !empty($items) && count($items) > 0)
    <ul class="navbar-nav navbar-mobile ml-auto">
        @foreach($items as $item)
            <li class="nav-item {{ !empty($item->children) == true ? 'dropdown' : '' }}">
                <a class="nav-link" href="{{ $item->link }}">{{ $item->title }}
                    @if(!empty($item->children))
                        <i class="caret ti-plus"></i>
                    @endif
                </a>
                <x-site.menu :items="$item->children"></x-site.menu>
            </li>
        @endforeach
    </ul>
@endif
