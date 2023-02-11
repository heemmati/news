
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
    <select class=" form-control select_js"
            name="{{ $field }}" {{ isset($important) == true ? 'required' : ''}} >


            @if(isset($items) && !empty($items) && count($items) > 0)

                @if($items[0]->getRoute() == $route_name)
                    <option value="0">@lang('site.mother')</option>
                @endif
                @foreach($items as $item)


                    <option
                        value="{{ $item->id }}" {{ !empty($value) == true ? $value == $item->id ? 'selected' : '' : '' }}> {{ !empty($item->title) ? $item->title : $item->name  }} </option>
                @endforeach
            @else

                    <option value="0">@lang('site.mother')</option>

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
