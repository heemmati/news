<div class="col-md-6">
    @include('shows.small')
    <div class="show-select">
        @foreach($show[1]::latest()->get() as $item)
            @if($item->id == $object->$key )
                <span>
                    {{ $item->title }}
                </span>

                @break
            @endif
        @endforeach
    </div>

</div>
