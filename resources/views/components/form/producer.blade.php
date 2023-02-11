{{ $value}}
<div class="form-group">

    <x-form.partials.error :name="$name"></x-form.partials.error>

    <x-form.partials.label :namefa="$namefa" :type="$type" :important="$require"></x-form.partials.label>


    <input type="text" name="{{ !empty($name) == true ? $name : 'title' }}"
           class="form-control"
           value="{{ !empty($value) == true ? $value : '' }}"
           placeholder="{{ $namefa }}  {{ $type }} را وارد کنید"
        {{ $require == true ? 'required' : '' }}>


        <select class="form-control select_js"
        name="{{ $name }}_id" {{ $require == true ? 'required' : ''}}>


    @if(isset($items) && !empty($items) && count($items) > 0)

<option> 
پیش فرض
</option>
        @foreach($items as $item)

            @if($multiple)
                <option
                    value="{{ $item->id }}"
                    {{ !empty($value2) == true ?  in_array($item->id ,$value2) ? 'selected' : '' : '' }}>
                    {{ !empty($item->title) ? $item->title : $item->name  }} </option>
            @else
                <option
                    value="{{ $item->id }}"
                    {{ !empty($value2) == true ? $value2 == $item->id ? 'selected' : '' : '' }}>
                    {{ !empty($item->title) ? $item->title : $item->name  }} </option>
            @endif
        @endforeach

    @else

        <option value="0"> پیش فرض</option>

    @endif


</select>







</div>



