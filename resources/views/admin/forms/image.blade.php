<div class="form-group input-group">
    <label> {{ $fieldFa }} {{ $type }}
        @if(isset($important))
            <small class="text-danger">*</small>
        @endif
    </label>
    <div class="form-group input-group">
    <input type="file"  class="form-control " name="{{ $field }}"
           value="{{  !empty($value) == true ? $value : old($field) }}">

        @if(isset($value) && !empty($value))
        <img
            width="100"
            height="100"
            style="border: 5px solid #a5a5a5;border-radius: 5px; margin: 15px;"
            src="{{ \Illuminate\Support\Facades\Storage::url($value) }}"
            alt=""
        >
          @endif
    </div>
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



{{--<div class="form-group input-group">--}}
{{--    <label> {{ $fieldFa }} {{ $type }}--}}
{{--        @if(isset($important))--}}
{{--            <small class="text-danger">*</small>--}}
{{--        @endif--}}
{{--    </label>--}}
{{--    <div class="form-group input-group">--}}
{{--        <input type="text" id="image_label" class="form-control image_label" name="{{ $field }}"--}}
{{--               aria-label="Image" aria-describedby="button-image" value="{{  !empty($value) == true ? $value : old($field) }}">--}}
{{--        <div class="input-group-append">--}}
{{--            <button class="button-image btn btn-primary" type="button"  id="button-image">--}}
{{--                @lang('site.choose')--}}
{{--            </button>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <small  class="form-text text-muted">--}}

{{--        @if(config('app.locale') == \App\Utility\Lang::PERSIAN)--}}

{{--            {{ $fieldFa }} {{ $type }}--}}
{{--            @lang('site.form_input_small')--}}
{{--        @else--}}
{{--            @lang('site.form_input_small')--}}
{{--            {{ $type }}  {{ $fieldFa }}--}}
{{--        @endif--}}

{{--    </small>--}}
{{--</div>--}}
