<div class="form-group input-group">
    <label> {{ $fieldFa }} {{ $type }}
        @if(isset($important))
            <small class="text-danger">*</small>
        @endif
    </label>
    <div class="form-group input-group">
        <input type="file" class="form-control" name="{{ $field }}"
               value="{{  !empty($value) == true ? $value : old($field) }}">

        @if(isset($value) && !empty($value))
            <video width="100" height="100" controls>
                <source src="{{ \Illuminate\Support\Facades\Storage::url($value) }}" type="video/mp4" >
                Your browser does not support the video tag.
            </video>
        @endif

    </div>
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
