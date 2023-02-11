@extends('auth.layout.master2')

@section('content')

    <div class="form-wrapper form-wrapper2">
        <!-- logo -->
        <div id="logo">
            <img class="logo" style="width: 100%" src="{{ Storage::url( $main_setting->getItem('logo')->image) }}"
                 alt="">
            <img class="logo-dark" style="width: 100%" src="{{ Storage::url( $main_setting->getItem('logo')->image) }}"
                 alt="">
        </div>

        <h5>@lang('site.complete_info_real')</h5>

        <!-- form -->
        <form method="POST" action="{{ route('auth.register.real') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="account" value="{{ $account }}">
            <input type="hidden" name="person" value="{{ \App\Utility\Acl::REAL }}">

            @include('error.forms')

            <div class="row">
                @if($account != \App\Utility\Acl::USER)

                    <div class="col-12 col-md-12">
                        <div class="form-group">
                            <label for="">@lang('site.enter_identifier_code')</label>
                            <input type="number" name="presentation_code" class="form-control"
                                   placeholder="@lang('site.enter_identifier_code')"
                                value="{{ old('presentation_code') }}"
                                >
                            
                            <small>
                                @lang('site.enter_identifier_code')
                            </small>
                        </div>
                    </div>


                @endif

                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label for="">@lang('site.name_and_lastname')</label>
                        <input type="text" name="name" class="form-control"
                               value="{{ old('name') }}"
                               placeholder="@lang('site.name_and_lastname')" required>
                        <small>
                            @lang('site.name_and_lastname')
                        </small>
                    </div>
                </div>

                <div class="col-12 col-md-12">
                    <div class="form-group">
                        <label for="">@lang('site.username_name')</label>
                        <input type="text" name="username" class="form-control"
                               value="{{ old('username') }}"
                               placeholder="@lang('site.enter_username')"
                               required>
                        <small>
                            @lang('site.enter_user_username')
                        </small>
                    </div>
                </div>
            </div>
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
                               placeholder="@lang('site.enter_user_phone_nuimer')" required>
                        <small>
                            @lang('site.enter_user_phone_nuimer')
                        </small>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="form-group">
                        <label for="">@lang('site.melli_code') </label>
                        <input type="number" name="melli_code" class="form-control"
                               value="{{ old('melli_code') }}"
                               placeholder=" @lang('site.enter_national_code')"
                               required
                        >
                        <small>
                            @lang('site.enter_national_code')
                        </small>
                    </div>

                </div>
            </div>
            <div class="row">

                <div class="col-12 col-md-6">

                    <div class="form-group">
                        <label for="">@lang('site.national_heir_code')</label>
                        <input type="number" name="heir_melli_code" class="form-control"
                               value="{{ old('heir_melli_code') }}"
                               placeholder="   @lang('site.enter_heir_name')" required
                        >
                        <small>
                            @lang('site.enter_heir_name')
                        </small>
                    </div>
                </div>

                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label for="">@lang('site.heir_name')</label>
                        <input type="text" name="heir_name" class="form-control"
                               value="{{ old('heir_name') }}"
                               placeholder="@lang('site.enter_heir_name')" required
                        >
                        <small>
                            @lang('site.enter_heir_name')
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
                    <div class="col-12 col-6">
                        <div class="form-group">
                            <label for=""> @lang('site.state') </label>
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
                            <input type="number" class="form-control" placeholder=" @lang('site.zip_code')"
                                   value="{{ old('postalcode') }}"
                                   name="postalcode">
                            <small>
                                @lang('site.zip_code')
                            </small>
                        </div>
                    </div>

                    <div class="col-12 col-md-12">
                        <div class="form-group">
                            <label for="">@lang('site.complete_address')</label>
                            <textarea class="form-control" name="address" id="" cols="30" rows="10"
                                      placeholder="@lang('site.enter_full_address')">
                                {{ old('address') }}
                               
                            </textarea>
                            <small>
                                @lang('site.enter_full_address')
                            </small>
                        </div>
                    </div>
                    <div class="col-12 col-md-12">
                        <div class="form-group">
                            <label> @lang('site.geographical_coordinates')

                                <small class="text-danger">*</small>

                            </label>
                            <div id="mapid"></div>
                            <input type="hidden" id="long" name="longitude"   value="{{ old('longitude') }}">
                            <input type="hidden" id="lat" name="latitude"   value="{{ old('latitude') }}">
                            <small class="form-text text-muted">  @lang('site.enter_user_coordinate') </small>
                        </div>

                    </div>

                </div>
                {{-- Address --}}
            </div>
            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="form-group input-group">
                        <label for="">@lang('site.profile_image')</label>
                        <div class="form-group input-group">
                            <input type="file" class="form-control image_label"
                                   placeholder="@lang('site.upload_profile_image')" name="avatar">

                        </div>
                        <small>
                            @lang('site.upload_profile_image')
                        </small>
                    </div>
                </div>
                <div class="col-12 col-md-12">
                    <div class="form-group input-group">
                        <label for="">@lang('site.personal_image')</label>
                        <div class="form-group input-group">
                            <input type="file" class="form-control "
                                   placeholder="@lang('site.enter_personal_image')" name="personal"
                            >

                        </div>
                        <small>
                            @lang('site.enter_personal_image')
                        </small>
                    </div>
                </div>
                <div class="col-12 col-md-12">
                    <div class="form-group input-group">
                        <label for="">@lang('site.melli_card')</label>
                        <div class="form-group input-group">
                            <input type="file" class="form-control "
                                   placeholder="@lang('site.upload_national_card')" name="melli_card"
                            >

                        </div>
                        <small>
                            @lang('site.upload_national_card')
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
@include('sweetalert::alert');


@section('scripts')
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
    <script src="{{ Url('admin-theme') }}/assets/js/leaflet.js"></script>
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
            center: [35.6881932, 51.39287],
            zoom: 13,
            doubleClickZoom: true,
        });

        L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoiaGVlbW1hdGkiLCJhIjoiY2tidjQ1aWN1MDJkYzJ3dGI5YzhpZ3ZjdiJ9.sh34Ce17akhCN5aDKXPV5Q', {
            attribution: 'دیجی آفاق',
            maxZoom: 18,
            id: 'mapbox/streets-v11',
            tileSize: 512,
            zoomOffset: -1,
            accessToken: 'pk.eyJ1IjoiaGVlbW1hdGkiLCJhIjoiY2tidjQ1aWN1MDJkYzJ3dGI5YzhpZ3ZjdiJ9.sh34Ce17akhCN5aDKXPV5Q'
        }).addTo(map);

        var marker = L.marker([35.6881932, 51.39287]).addTo(map);

        function onMapClick(e) {
            lat = e.latlng.lat;
            lon = e.latlng.lng;

            $('#long').val(lon);
            $('#lat').val(lat);
            //Clear existing marker,

            if (marker != undefined) {
                map.removeLayer(marker);
            }
            ;

            //Add a marker to show where you clicked.
            marker = L.marker([lat, lon]).addTo(map);
        }

        map.on('click', onMapClick);


    </script>
@endsection

