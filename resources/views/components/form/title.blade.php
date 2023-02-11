<div class="form-group">
    @error( !empty($name) == true ? $name : 'title' )
    <small id="emailHelp" class="text text-danger font-weight-bolder">
        {{ $message }}
    </small>
    @enderror
    <label for=""> عنوان {{ $type }}  </label>
    <input type="text" name="{{ !empty($name) == true ? $name : 'title' }}"
           class="form-control"
           placeholder="عنوان  {{ $type }} را وارد کنید"
           {{ !empty($require) == true ? '' : 'required' }}>

</div>
