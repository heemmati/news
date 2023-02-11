@if(isset($items)  && !empty($items))
    <option value="">

    </option>
    @foreach($items as $item)
        <option value="{{ $item->id }}">
            {{ $item->title }}
        </option>
    @endforeach
@endif
