<div class="card">
    <div class="card-body">
        <h3 class="card-title">@lang('site.gallery_attach')</h3>
        <div class="form-group">
            <x-form.partials.error :name="$name"></x-form.partials.error>

            <x-form.partials.label :namefa="$namefa" :type="$type" :important="$require"></x-form.partials.label>

            <br>


            <button id="gallery_button" role="button" type="button"
                    class="btn btn-dribbble">  @lang('site.gallery_attach') </button>
            @if(isset($value) && !empty($value) && count($value) > 0)
                <input type="hidden" name="{{ $name }}" id="input_gallery" value="{{ $value[0]->id }}">
                <h6>
                                            <span id="showing_gallery_name">
{{ $value[0]->title }}
                                            </span>

                </h6>


                <a href="javascript:void(0)" id="remove_default_gallery" class="btn">
                    @lang('site.remove')
                </a>


            @else
                <input type="hidden" name="{{ $name }}" id="input_gallery">
                <h6>
                                            <span id="showing_gallery_name">

                                            </span>

                </h6>
            @endif
        </div>
    </div>
</div>
