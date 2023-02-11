<div class="form-group">
    @error($field)
    <small id="emailHelp" class="text text-danger font-weight-bolder">
        {{ $message }}
    </small>
    @enderror

    <label> {{ $fieldFa }} {{ $type }}
        @if(isset($important))
            <small class="text-danger">*</small>
        @endif
    </label>
    <textarea name="{{ $field }}"   id="{{ $field == 'body' ? 'body' : ''}}" class="form-control" cols="30" rows="5">{{ empty($value) ? old($field) : $value }}</textarea>

    <small  class="form-text text-muted">

        @if(config('app.locale') == \App\Utility\Lang::PERSIAN)

            {{ $fieldFa }} {{ $type }}
            @lang('site.form_input_small')
        @else
            @lang('site.form_input_small')
            {{ $type }}  {{ $fieldFa }}
        @endif

    </small>
</div>
