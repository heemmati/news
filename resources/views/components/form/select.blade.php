<div class="form-group wd-xs-300">
    <x-form.partials.error :name="$name"></x-form.partials.error>

    <x-form.partials.label :namefa="$namefa" :type="$type" :important="$require"></x-form.partials.label>


    <select class=" form-control select_js"
            name="{{ $name }}{{$multiple == true ? '[]' : '' }}" {{ $require == true ? 'required' : ''}} {{ $multiple == true ? 'multiple' : ''}} >


        @if(isset($items) && !empty($items) && count($items) > 0)
        <option value="">
            @lang('site.choose')

    </option>
            @foreach($items as $item)

                @if($multiple)
                    <option
                        value="{{ $item->id }}"
                        {{ !empty($value) == true ?  in_array($item->id ,$value) ? 'selected' : '' : '' }}>
                        {{ !empty($item->title) ? $item->title : $item->name  }} </option>
                @else
                    <option
                        value="{{ $item->id }}"
                        {{ !empty($value) == true ? $value == $item->id ? 'selected' : '' : '' }}>
                        {{ !empty($item->title) ? $item->title : $item->name  }} </option>
                @endif
            @endforeach

        @else

            <option value="0">@lang('site.default')</option>

        @endif


    </select>

</div>
