<div class="form-group">
    @error( !empty($name) == true ? $name : 'image' )
    <small id="emailHelp" class="text text-danger font-weight-bolder">
        {{ $message }}
    </small>
    @enderror
    <label for=""> {{ $namefa }} {{ $type }}  </label>
    <input type="file" name="{{ !empty($name) == true ? $name : 'src' }}"
           class="form-control"
           placeholder="{{ $namefa }}  {{ $type }} را وارد کنید"
        {{ !empty($require) == true ? '' : 'required' }}>

</div>
