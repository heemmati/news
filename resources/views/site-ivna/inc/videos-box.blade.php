@if(isset($videos) && !empty($videos) && count($videos) > 0 )
    @foreach($videos as $video)
        <h4>{{ $video->title }}</h4>
        <video class="video-object" controls>
            <source
                src="{{ \Illuminate\Support\Facades\Storage::url($video->src) }}"
                alt="{{ $video->alt }}" type="video/mp4">

            Your browser does not support the video tag.
        </video>
    @endforeach
@endif
