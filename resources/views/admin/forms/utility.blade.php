
@if($field == 'lang')
    <input type="hidden" name="lang" value="{{ config('app.locale') }}">
    @else
    <div class="form-group wd-xs-300">
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
        <select class=" form-control" name="{{$field }}" {{ isset($important) == true ? 'required' : ''}}  >


            @if(isset($items))
                @foreach($items as $key => $item)
                    <option value="{{$key}}"  {{ !empty($value) == true ? $value == $key ? 'selected' : '' : '' }}> {{ $item }} </option>
                @endforeach
            @endif
        </select>
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

@endif
