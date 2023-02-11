<form action="{{ route('site.rating.save') }}" method="post">
    @csrf

    <input type="hidden" name="ratingable_id" value="{{ $id }}">
    <input type="hidden" name="ratingable_type" value="{{ $type }}">

    <span class="star__container">
      <input type="radio" name="rating" value="1" id="star-1" class="star__radio visuhide" {{  round($value) == 1 ? 'checked' : '' }}>
      <input type="radio" name="rating" value="2" id="star-2" class="star__radio visuhide" {{  round($value) == 2 ? 'checked' : '' }}>
      <input type="radio" name="rating" value="3" id="star-3" class="star__radio visuhide" {{  round($value) == 3 ? 'checked' : '' }}>
      <input type="radio" name="rating" value="4" id="star-4" class="star__radio visuhide" {{  round($value) == 4 ? 'checked' : '' }}>
      <input type="radio" name="rating" value="5" id="star-5" class="star__radio visuhide" {{  round($value) == 5 ? 'checked' : '' }}>

      <label class="star__item" for="star-1"><span class="visuhide">1 star</span></label>
      <label class="star__item" for="star-2"><span class="visuhide">2 stars</span></label>
      <label class="star__item" for="star-3"><span class="visuhide">3 stars</span></label>
      <label class="star__item" for="star-4"><span class="visuhide">4 stars</span></label>
      <label class="star__item" for="star-5"><span class="visuhide">5 stars</span></label>
    </span>

</form>
