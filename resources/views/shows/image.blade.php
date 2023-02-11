<div class="col-md-6">

    @include('shows.small')
    <a class="show-image" href="{{ Storage::url($object->$key) }}">
        <img src="{{ Storage::url($object->$key) }}" alt="">
    </a>


</div>
