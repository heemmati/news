
@if(isset($value) && !empty($value))


        <div class="row gallery-wrapper">
            @foreach($value as $item)

            <div class="col-12 col-md-6 ">
                <div class="form-group input-group">
                    <a class="btn btn-sm btn-success gallery-add" href="javascript:void(0)">
                        <i class="far fa-plus"></i>
                    </a>

                    <a class="btn btn-sm btn-danger gallery-remove" href="javascript:void(0)">
                        <i class="far fa-minus"></i>
                    </a>

                    <label> {{ $fieldFa }} {{ $type }}
                        @if(isset($important))
                            <small class="text-danger">*</small>
                        @endif
                    </label>
                    <div class="form-group input-group">

                        <input type="file" id="image_label" class="form-control "
                               name="{{ $field }}[]"
                             value="{{ $item->src }}">


                        @if(isset($item) && !empty($item))
                            <img
                                width="100"
                                height="100"
                                style="border: 5px solid #a5a5a5;border-radius: 5px; margin: 15px;"
                                src="{{ \Illuminate\Support\Facades\Storage::url($item->src) }}"
                                alt=""
                            >
                        @endif



                    </div>



                    <small  class="form-text text-muted">

                        @if(config('app.locale') == \App\Utility\Lang::PERSIAN)

                            {{ $fieldFa }} {{ $type }}
                            @lang('site.form_input_small')
                        @else
                            @lang('site.form_input_small')
                            {{ $type }}  {{ $fieldFa }}
                        @endif

                    </small>




                </div>
            </div>
            @endforeach
        </div>

@else
    <div class="row gallery-wrapper">
        <div class="col-12 col-md-6 ">
            <div class="form-group input-group">

                    <a class="btn btn-sm btn-success gallery-add" href="javascript:void(0)">
                        <i class="far fa-plus"></i>
                    </a>

                    <a class="btn btn-sm btn-danger gallery-remove" href="javascript:void(0)">
                        <i class="far fa-minus"></i>
                    </a>



                <label> {{ $fieldFa }} {{ $type }}
                    @if(isset($important))
                        <small class="text-danger">*</small>
                    @endif
                </label>
                <div class="form-group input-group">

                    <input type="file" id="image_label" class="form-control image_label"
                           name="{{ $field }}[]"
                    >

                </div>


                <small  class="form-text text-muted">

                    @if(config('app.locale') == \App\Utility\Lang::PERSIAN)

                        {{ $fieldFa }} {{ $type }}
                        @lang('site.form_input_small')
                    @else
                        @lang('site.form_input_small')
                        {{ $type }}  {{ $fieldFa }}
                    @endif

                </small>



            </div>
        </div>
    </div>
@endif

