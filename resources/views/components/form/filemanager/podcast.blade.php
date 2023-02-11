<div class="card">
    <div class="card-body">
        <h3 class="card-title">@lang('site.podcast_attach')</h3>
        <div class="form-group">
            <x-form.partials.error :name="$name"></x-form.partials.error>

            <x-form.partials.label :namefa="$namefa" :type="$type" :important="$require"></x-form.partials.label>

            <br>


            <button id="podcast_button" role="button" type="button" class="btn btn-info">@lang('site.upload_podcast')
            </button>
            @if(isset($value) && !empty($value) && count($value) > 0)

                <input type="hidden" name="{{ $name }}" id="input_podcast" value="{{ $value[0]->id }}">

                <h6>
                                            <span id="showing_podcast_name">
                 {{ $value[0]->title }}
                                            </span>

                </h6>
                <a href="javascript:void(0)" id="remove_default_podcast" class="btn">
                    @lang('site.remove')
                </a>


            @else
                <input type="hidden" name="{{ $name }}" id="input_podcast">
                <h6>
                                            <span id="showing_podcast_name">

                                            </span>

                </h6>
            @endif
        </div>
    </div>
</div>
