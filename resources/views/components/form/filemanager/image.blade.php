<div class="card">
    <div class="card-body">
        <h3 class="card-title">@lang('site.attach_image')</h3>
        <div class="form-group">

            <x-form.partials.error :name="$name"></x-form.partials.error>

            <x-form.partials.label :namefa="$namefa" :type="$type" :important="$require"></x-form.partials.label>

            <br>


            <div class="input-group">
   <span class="input-group-btn">
     <a id="img_lfm{{ !empty($second) ? $second : '' }}" data-input="thumbnail{{ !empty($second) ? $second : '' }}" data-preview="holder{{ !empty($second) ? $second : '' }}" class="lfm btn btn-primary">
       <i class="fa fa-picture-o"></i> انتخاب
     </a>
   </span>

                <input id="thumbnail{{ !empty($second) ? $second : '' }}" value=" {{ !empty($value) ? $value : ''  }}" class="lfm form-control" type="text" name="{{ $name }}">
            </div>
            @if(isset($value) && !empty($value))
            <img id="holder{{ !empty($second) ? $second : '' }}" style="margin-top:15px;max-height:100px;" src="{{ Storage::url($value) }}">
            @endif



        </div>

    </div>
</div>


