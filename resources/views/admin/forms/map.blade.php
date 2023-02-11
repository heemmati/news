@if(isset($value) && !empty($value))
    <div class="form-group">
        @error($field)
        <small id="emailHelp" class="text text-danger font-weight-bolder">
            {{ $message }}
        </small>
        @enderror
        <label>
            @lang('site.geographical_coordinates')
            @if(isset($important))
                <small class="text-danger">*</small>
            @endif
        </label>
        <div id="mapid"></div>
        <input type="hidden" id="long" name="longitude">
        <input type="hidden" id="lat" name="latitude">
        <small class="form-text text-muted">

            @if(config('app.locale') == \App\Utility\Lang::PERSIAN)

                {{ $fieldFa }} {{ $type }}
                @lang('site.form_input_small')
            @else
                @lang('site.form_input_small')
                {{ $type }}  {{ $fieldFa }}
            @endif

        </small>
    </div>
@else
    <div class="form-group">
        @error($field)
        <small id="emailHelp" class="text text-danger font-weight-bolder">
            {{ $message }}
        </small>
        @enderror
        <label>
            @lang('site.geographical_coordinates')
            @if(isset($important))
                <small class="text-danger">*</small>
            @endif
        </label>
        <div id="mapid"></div>
        <input type="hidden" id="long" name="longitude">
        <input type="hidden" id="lat" name="latitude">
        <small class="form-text text-muted">

            @if(config('app.locale') == \App\Utility\Lang::PERSIAN)

                {{ $fieldFa }} {{ $type }}
                @lang('site.form_input_small')
            @else
                @lang('site.form_input_small')
                {{ $type }}  {{ $fieldFa }}
            @endif

        </small>
    </div>
@endif
