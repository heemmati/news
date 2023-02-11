
@if(isset($items)  && !empty($items))
    @foreach($items as $item)
        <option value="{{ $item->id }}">
            {{ $item->title }}
        </option>
    @endforeach
    @else
    <option value="0">
       مادر
    </option>
@endif
