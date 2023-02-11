{{--{{ dd($value) }}--}}
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
    <select class=" form-control select_js" name="{{ $field }}[]"
            {{ isset($important) == true ? 'required' : ''}} multiple style="height: 100px">


        @if(isset($items) && !empty($items) && count($items) > 0)

            @if($items[0]->getRoute() == $route_name)
                <option value="0">@lang('site.mother')</option>
            @endif

            @if(isset($value))
                @if(!is_array($value))
                    @php


                        $value2 = $value->pluck('id')->toArray();

                    @endphp
                @endif
            @endif



            @foreach($items as $item)
                @if(isset($value2))
                    <option
                        value="{{ $item->id }}"
                        {{ in_array($item->id , $value2 ) ?  'selected' : ''  }}>
                        @if(isset($item->title) && !empty($item->title))
                            {{ $item->title }}
                        @elseif(isset($item->name) && !empty($item->name))
                            {{ $item->name }} - {{ $item->family }} - {{ $item->email }} - {{ $item->mobile }}
                        @else
                        @endif
                    </option>
                @else
                    <option
                        value="{{ $item->id }}"
                        {{ !empty($value) == true ? $value == $item->id ? 'selected' : '' : '' }}>
                        @if(isset($item->title) && !empty($item->title))
                            {{ $item->title }}
                        @elseif(isset($item->name) && !empty($item->name))
                            {{ $item->name }} - {{ $item->family }} - {{ $item->email }} - {{ $item->mobile }}
                        @else
                        @endif
                    </option>
                @endif
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
