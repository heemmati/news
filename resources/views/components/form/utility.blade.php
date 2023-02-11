
<div class="form-group wd-xs-300" id="{{ !empty($id) == true ? $id : '' }}">
    <x-form.partials.error :name="$name"></x-form.partials.error>

    <x-form.partials.label :namefa="$namefa" :type="$type" :important="$require"></x-form.partials.label>


    <select class=" form-control select_js"
            id="{{ !empty($id) == true ? $id : '' }}"
            name="{{ $name }}" {{ $require == true ? 'required' : ''}} {{ $multiple == true ? 'multiple' : ''}} >



        @if(isset($items) && !empty($items) && count($items) > 0)
        <option value="">
            @lang('site.choose')

    </option>
            @foreach($items as $key => $item)

                <option
                    value="{{ $key }}"
                    {{ !empty($value) == true ? $value == $key ? 'selected' : '' : '' }}>
                    {{ $item  }} </option>
            @endforeach

        @else

            <option value="0"> @lang('site.default') </option>

        @endif


    </select>

</div>
