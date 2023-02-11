<div class="col-md-6">
    @include('shows.small')
    <div class="show-utility">
        @foreach($show[1]::items() as $keywo=>$item)
            @if($keywo == $object->$key )
                <span>
                    {{ $item }}
                </span>

                @break
            @endif
        @endforeach
    </div>

</div>
