<div class="form-group">

    <x-form.partials.error :name="$name"></x-form.partials.error>

    <x-form.partials.label :namefa="$namefa" :type="$type" :important="$require"></x-form.partials.label>


    <textarea class="form-control {{ $name=='body' ? 'body' : '' }}"
              name="{{ !empty($name) == true ? $name : 'description' }}"
              id="" cols="30" rows="10"
              placeholder=" {{ $namefa }}  {{ $type }}  را وارد کنید ">

        @if(!empty($value) && isset($value))
{!! $value !!}
        @endif
    </textarea>

    <small class="counter_small"></small>

</div>
