<div class="card">
    <div class="card-body">
        <h3 class="card-title"></h3>
        <div class="form-group">
            <x-form.partials.error :name="$name">@lang('site.file_attach')</x-form.partials.error>

                        <x-form.partials.label :namefa="$namefa" :type="$type" :important="$require"></x-form.partials.label>

            <br>

            <button id="file_button" role="button" type="button" class="btn btn-info">@lang('site.upload_file')</button>
            @if(isset($value) && !empty($value) && count($value) > 0)
                <input type="hidden" name="{{ $name }}" id="input_file" value="{{ $value[0]->id }}">

                <h6>
                                            <span id="showing_file_name">
{{ $value[0]->title }}
                                            </span>

                </h6>
                <a href="javascript:void(0)" id="remove_default_file" class="btn">
                    @lang('site.remove')
                </a>
            @else
                <input type="hidden" name="{{ $name }}" id="input_file">

                <h6>
                                            <span id="showing_file_name">

                                            </span>

                </h6>

            @endif
        </div>
    </div>
</div>
