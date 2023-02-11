@if(isset($value) && !empty($value))

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

        <input type="hidden" id="category_value" name="{{ $field }}" value="{{ $value }}">
        <div class="row" id="category_input">

            {{ \App\Lubricator\ViewController::category_levels($value , \App\Lubricator\ViewController::category_level_find($value) , $value) }}

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

        <input type="hidden" id="category_value" value="0" name="{{ $field }}">
        <div class="row" id="category_input">

            <div class="col-3" id="category0">
                <div class="category_box">
                    <ul>
                        @if(isset($items) && !empty($items))
                            @foreach($items as $item)
                                <li>
                                    <a href="javascript:void(0)" data-parent="{{ $item->id }}" data-counter="0">
                                        {{ $item->title }}
                                    </a>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>
        </div>
        <small class="form-text text-muted">
            @if(config('app.locale') == \App\Utility\Lang::PERSIAN)

                {{ $fieldFa }} {{ $type }}
                @lang('site.form_input_small')
                @else
                @lang('site.form_input_small')
                {{ $fieldFa }} {{ $type }}
                @endif


        </small>

    </div>
@endif
