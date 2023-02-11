@extends('auth.layout.master2')
@section('content')

    <div class="form-wrapper form-wrapper2">
        <!-- logo -->
        <div id="logo">
            <img class="logo" style="width: 100%" src="{{ Storage::url( $main_setting->getItem('logo')->image) }}" alt="">
            <img class="logo-dark" style="width: 100%" src="{{ Storage::url( $main_setting->getItem('logo')->image) }}" alt="">
        </div>

    <h5>@lang('site.complete_legal_info')</h5>

    <!-- form -->
    <form method="POST" action="{{ route('auth.register.legal') }}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="account" value="{{ $account }}">
        <input type="hidden" name="person" value="{{ \App\Utility\Acl::LEGAL }}">


        @include('error.forms')
        @if($account != \App\Utility\Acl::USER)
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label for="">@lang('site.enter_identifier_code')</label>
                        <input type="number" name="presentation_code" class="form-control"
                               value="{{ old('presentation_code') }}"
                               placeholder="@lang('site.enter_identifier_code')" >
                        <small>
                            @lang('site.enter_identifier_code')
                        </small>
                    </div>
                </div>

                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label for="">@lang('site.company_name')</label>
                        <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="@lang('site.enter_user_company_name')"
                               required>
                        <small>
                            @lang('site.enter_user_company_name')
                        </small>
                    </div>
                </div>

                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label for=""> @lang('site.enter_user_username')</label>
                        <input type="text" name="username"
                               value="{{ old('username') }}"
                               class="form-control" placeholder=" @lang('site.enter_user_username')"
                               required>
                        <small>
                            @lang('site.enter_user_username')
                        </small>
                    </div>
                </div>
            </div>
        @endif

        <div class="row">
            @if(empty(session('mobile_verify')))
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label for="">@lang('site.mobile_phone')</label>
                        <input type="number" name="mobile" class="form-control"
                               value="{{ old('mobile') }}"
                               placeholder="  @lang('site.enter_user_mobile_phone')" required>
                        <small>
                            @lang('site.enter_user_mobile_phone')
                        </small>
                    </div>
                </div>
            @else
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label for="">@lang('site.email')</label>
                        <input type="email" name="email" class="form-control"
                               value="{{ old('email') }}"
                               placeholder="  @lang('site.enter_email')" required>
                        <small>
                            @lang('site.enter_email')
                        </small>
                    </div>
                </div>
            @endif
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label for="">@lang('site.phone_number')</label>
                    <input type="number" name="phone" class="form-control"
                           value="{{ old('phone') }}"
                           placeholder=" @lang('site.enter_user_phone_nuimer')" required>
                    <small>
                        @lang('site.enter_user_phone_nuimer')
                    </small>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label for="">@lang('site.registration_number')</label>
                    <input type="number" value="{{ old('register_number') }}" name="register_number" class="form-control"
                           placeholder="@lang('site.enter_user_registeration_company_number')" required>
                    <small>
                        @lang('site.enter_user_registeration_company_number')
                    </small>
                </div>
            </div>

            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label for="">@lang('site.melli_code')</label>
                    <input type="number"  value="{{ old('melli_code') }}"
                           name="melli_code" class="form-control" placeholder="@lang('site.enter_national_code')"
                           required>
                    <small>
                        @lang('site.enter_national_code')
                    </small>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label for="">@lang('site.type_of_stock')</label>
                    <select class="form-control" name="equity_type" id="">
                        <option value="private" {{ old('equity_type') == 'private' ? 'selected' : '' }}>@lang('site.Private_Equity')</option>
                        <option value="public" {{ old('equity_type') == 'public' ? 'selected' : '' }}>@lang('site.Public_Stock')</option>
                    </select>
                    <small>
                        @lang('site.Enter_the_type_of_user_stock')
                    </small>
                </div>
            </div>

            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label for="">@lang('site.company_manager_name')</label>
                    <input type="text" value="{{ old('manager_name') }}" name="manager_name" class="form-control" placeholder=" @lang('site.enter_user_company_manager')"
                           required>
                    <small>
                        @lang('site.enter_user_company_manager')
                    </small>
                </div>
            </div>


        </div>


        {{-- Address --}}
        <div class="row">
            <div class="col-12 col-6">
                <div class="form-group">
                    <label for="">@lang('site.country')</label>
                    <select name="country_id" id="country_id" class="form-control">
                        <option value="">انتخاب کنید</option>
                        @foreach($countries as $country)
                            <option value="{{ $country->id }}" {{ old('country_id') == $country->id ? 'selected' : '' }}>
                                {{ $country->title }}
                            </option>
                        @endforeach
                    </select>
                    <small>
                        @lang('site.select_user_country')
                    </small>
                </div>
            </div>
            <div class="col-12 col-6">
                <div class="form-group">
                    <label for="">  @lang('site.state')</label>
                    <select name="state_id" id="state_id" class="form-control">

                    </select>
                    <small>
                        @lang('site.select_state_user')
                    </small>
                </div>
            </div>
            <div class="col-12 col-6">
                <div class="form-group">
                    <label for="">@lang('site.city')</label>
                    <select name="city_id" id="city_id" class="form-control">

                    </select>
                    <small>
                        @lang('site.enter_user_state')
                    </small>
                </div>
            </div>
            <div class="col-12 col-6">
                <div class="form-group">
                    <label for="">@lang('site.postal_code')</label>
                    <input type="number" class="form-control" placeholder="@lang('site.zip_code')" name="postalcode">
                    <small>
                        @lang('site.zip_code')
                    </small>
                </div>
            </div>
            <div class="col-12 col-md-12">
                <div class="form-group">
                    <label for="">@lang('site.complete_address')</label>
                    <textarea class="form-control" name="address" id="" cols="30" rows="10"
                              placeholder=" @lang('site.enter_full_address')"></textarea>
                    <small>
                        @lang('site.enter_full_address')
                    </small>
                </div>
            </div>
            <div class="col-12 col-md-12">
                <div class="form-group">
                    <label> @lang('site.Geographical_coordinates')

                        <small class="text-danger">*</small>

                    </label>
                    <div id="mapid"></div>
                    <input type="hidden" id="long" name="longitude">
                    <input type="hidden" id="lat" name="latitude">
                    <small  class="form-text text-muted"> @lang('site.enter_user_coordinate') </small>
                </div>

            </div>

        </div>
        {{-- Address --}}


        <div class="row">
            <div class="col-12 col-md-12">
                <div class="form-group input-group">
                    <label for="">@lang('site.profile_image')</label>
                    <div class="form-group input-group">
                        <input type="file"  class="form-control "
                               placeholder="@lang('site.upload_profile_image')" name="avatar"
                        >

                    </div>
                    <small>
                        @lang('site.upload_profile_image')
                    </small>
                </div>
            </div>
            <div class="col-12 col-md-12">
                <div class="form-group input-group">
                    <label for="">@lang('site.official_newspaper_image')</label>
                    <div class="form-group input-group">
                        <input type="file" class="form-control"
                               placeholder=" @lang('site.upload_official_newspaper')" name="newspaper" >

                    </div>
                    <small>
                        @lang('site.upload_official_newspaper')
                    </small>
                </div>
            </div>
            <div class="col-12 col-md-12">
                <div class="form-group input-group">
                    <label for="">@lang('site.certificate_image')</label>
                    <div class="form-group input-group">
                        <input type="file"  class="form-control"
                               placeholder="@lang('site.upload_certificates_image')" name="certificate"
                        >

                    </div>
                    <small>
                        @lang('site.upload_certificates_image')
                    </small>
                </div>
            </div>
            <div class="col-12 col-md-12">
                <div class="form-group input-group">
                    <label for="">@lang('site.statute_image')</label>
                    <div class="form-group input-group">
                        <input type="file"  class="form-control"
                               placeholder="@lang('site.upload_statute_image')" name="statute">
                    </div>
                    <small>
                        @lang('site.upload_statute_image')
                    </small>
                </div>
            </div>
        </div>


        <button class="btn btn-primary btn-block">@lang('site.completer_info')</button>
        <hr>
        <p class="text-muted">@lang('site.do_have_account')</p>
        <a href="{{ route('login') }}" class="btn btn-outline-light btn-sm">@lang('site.sign_in')</a>
    </form>
    <!-- ./ form -->


</div>

    @endsection

@section('scripts')
<script src="{{ Url('admin-theme') }}/assets/js/leaflet.js"></script>


@include('sweetalert::alert');

<script>
    /* Image File Manager */
    var purpose;
    $(document).on('click', '.button-image', function () {
        window.open('/file-manager/fm-button', 'fm', 'width=1400,height=800');
        purpose = $(this);
    });

    // set file link
    function fmSetLink($url) {
        purpose.parent().parent().find('.image_label').val($url);
    }


</script>

<script>
    function getStates(country_id) {

        $.ajax({
            type: 'POST',
            url: "{{route('auth.register.state')}}",
            data: {
                "id": country_id,
                "_token": "{{ csrf_token() }}",
            },
            success: function (data) {
                $('#state_id').html(data.html);
            }
        });
    }

    function getCity(state_id) {

        $.ajax({
            type: 'POST',
            url: "{{route('auth.register.city')}}",
            data: {
                "id": state_id,
                "_token": "{{ csrf_token() }}",
            },
            success: function (data) {
                $('#city_id').html(data.html);
            }
        });
    }

    $(document).on('change', '#country_id', function () {

        getStates($(this).val());

    });


    $(document).on('change', '#state_id', function () {

        getCity($(this).val());

    });


    var map = L.map('mapid', {
        center: [35.6881932,51.39287],
        zoom: 13 ,
        doubleClickZoom : true ,
    });

    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoiaGVlbW1hdGkiLCJhIjoiY2tidjQ1aWN1MDJkYzJ3dGI5YzhpZ3ZjdiJ9.sh34Ce17akhCN5aDKXPV5Q', {
        attribution: 'دیجی آفاق',
        maxZoom: 18,
        id: 'mapbox/streets-v11',
        tileSize: 512,
        zoomOffset: -1,
        accessToken: 'pk.eyJ1IjoiaGVlbW1hdGkiLCJhIjoiY2tidjQ1aWN1MDJkYzJ3dGI5YzhpZ3ZjdiJ9.sh34Ce17akhCN5aDKXPV5Q'
    }).addTo(map);

    var marker = L.marker([35.6881932,51.39287]).addTo(map);

    function onMapClick(e) {
        lat = e.latlng.lat;
        lon = e.latlng.lng;

        $('#long').val(lon);
        $('#lat').val(lat);
        //Clear existing marker,

        if (marker != undefined) {
            map.removeLayer(marker);
        };

        //Add a marker to show where you clicked.
        marker = L.marker([lat,lon]).addTo(map);
    }

    map.on('click', onMapClick);



</script>
@endsection
