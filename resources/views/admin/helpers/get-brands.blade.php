@if(isset($brands)  && !empty($brands))
    @foreach($brands as $brand)
        <option value="{{ $brand->id }}">
            {{ $brand->title }}
        </option>
    @endforeach
@endif
