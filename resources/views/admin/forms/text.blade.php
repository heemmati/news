
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
    <input type="{{ $input }}"  name="{{  $field  }}" class="form-control" value="{{  !empty($value) == true ? $value : old($field) }}" placeholder="{{ $fieldFa }} {{ $type }} @lang('site.enter_form')">

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
