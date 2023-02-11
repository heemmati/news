
    @if (isset($image->image) && !empty($image->image))

        <img src="{{ \Illuminate\Support\Facades\Storage::url($image->image) }}"  alt="{{ $image->title }}">
        @else

        <img src="{{ url('site-theme') }}/images/inten/default-image.png" title="{{ $image->image }}"alt="{{ $image->title }}">
    @endif

