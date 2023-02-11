
<div class="form-group">

    <x-form.partials.error :name="$name"></x-form.partials.error>

    <x-form.partials.label :namefa="$namefa" :type="$type" :important="$require"></x-form.partials.label>


    <input type="{{ !empty($kind) == true ? $kind : 'text' }}" name="{{ !empty($name) == true ? $name : 'title' }}"
           class="form-control"
           value="{{ !empty($value) == true ? $value : '' }}"
           placeholder="{{ $namefa }}  {{ $type }} را وارد کنید"
        {{ $require == true ? 'required' : '' }}>

</div>
