
<div class="form-group">
    @error('tags')
    <small id="emailHelp" class="text text-danger font-weight-bolder">
        {{ $message }}
    </small>
    @enderror
    <label for=""> {{ __('site.input_tags') }} </label>

    <input type="text"
           name="tags"
           class="form-control tagsinput-example"
           placeholder="{{ __('site.input_tags') }}"
           @if(isset($tags) && !empty($tags))

           value="@foreach($tags as $key => $tag){{ $tag->title }}{{ $key + 1 == count($tags) ? '' : ',' }}@endforeach"
           data-role="tagsinput"
           @else
           value="{{ old('tags') }}"
        @endif
    >
</div>
