<div class="form-group">
    @php
      $rand =  \Illuminate\Support\Str::random(10)
    @endphp
    <div class="custom-control custom-switch">
        <input type="checkbox" name="{{ $name }}" class="custom-control-input" id="{{ $name }}{{$rand}}" {{ $value == true ? 'checked' : '' }}>
        <label class="custom-control-label" for="{{ $name }}{{ $rand }}">
           {{ $namefa }}
        </label>
    </div>
</div>
