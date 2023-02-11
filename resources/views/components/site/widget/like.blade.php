<div class="btn-group btn-group-sm">

    <form method="post" class="like_plus" action="{{ route('site.like.save') }}">
        @csrf
        <input type="hidden" name="likeable_id" value="{{ $id }}">
        <input type="hidden" name="likeable_type" value="{{ $type }}">
        <button type="submit" name="type" value="0" class="btn btn-danger">
            <i class="fa fa-thumbs-down"></i>
        </button>
        <button name="type" value="1"  id="" class="btn btn-success">
            <i class="fa fa-thumbs-up"></i>
        </button>
    </form>


</div>
