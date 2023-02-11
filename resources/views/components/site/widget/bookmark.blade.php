@if(!\Illuminate\Support\Facades\Auth::guest())
    <form action="{{ route('site.bookmark.save') }}" method="post">
        @csrf

        <input type="hidden" name="bookmarkable_id" value="{{ $id }}">
        <input type="hidden" name="bookmarkable_type" value="{{ $type }}">

        @if(!$booked)
            <button class="btn btn-sm btn-dark">
                <i class="fal fa-bookmark"></i>
            </button>
        @else
            <button class="btn btn-sm btn-dark">
                <i class="fas fa-bookmark"></i>
            </button>
        @endif
    </form>
@endif
